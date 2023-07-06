<?php

namespace App\Http\Controllers;

use App\Mail\ChangePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Image;

class AccountController extends Controller
{
    public function getFormRegister(){
        return view('account.register');
    }
    public function submitFormRegister(Request $request){
        $request->validate([
            'email' => "unique:users"
        ]);
        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->name = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 0;
        $user->save();
        if($user instanceof Model){
            return view('account.login')->with('message_success', 'You have successfully registered, please login');
        }
        return redirect()->back();
    }
    public function getFormLogin(){
        return view('account.login');
    }
    public function submitFormLogin(Request $request){
        $user = User::where('email', $request->email)->first();
        if(is_null($user)){
            return view('account.login')->with('message_fail', 'Email is not registered');
        }else{
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);
                //Xóa session giỏ hàng và cập nhật lại session giỏ hàng
                Session::forget('cart');
                //Lấy ra tất cả sản phẩm trong giỏ hàng theo id người dùng
                $cart = DB::table('carts')->where('idUser', '=', $user->id)->get();
                // Lọc ra sản phẩm chưa được thanh toán 
                $filter_cart = [];
                foreach($cart as $item){
                    if($item->idBill == ''){
                        array_push( $filter_cart , $item);
                    }
                }
                //Tạo session cart và thêm sản phẩm trong giỏ vào session cart
                Session::put('cart');
                $images = Image::get();
                foreach($filter_cart as $item){
                    $product = DB::table('products')->where('idProduct', '=', $item->idProduct)->first();
                    $product->qtyInCart = $item->quantityCart;
                    foreach($images as $image){
                        if($image->idProduct == $item->idProduct){
                            $product->srcImage = $image->srcImage;
                        }
                    }
                    Session::push('cart', $product);
                }
                if($user->role == 1){
                    return redirect()->route('admin.dashboard');
                }
                return redirect('/');
            }else{
                return view('account.login')->with('message_fail', 'Password is incorrect');
            }
        }
    }

    public function logout(){
        Session::forget('cart');
        Auth::logout();
        return redirect()->route('login');
    }

    public function getFormForgotPassword(){
        return view('account.forgotPassword');
    }
    public function submitFormForgotPassword(Request $request){
        $email = User::where('email', $request->email)->first();
        if(is_null($email)){
            return view('account.forgotPassword')->with('message_fail', 'Email is not registered');
        }else{
            $token = strtoupper(Str::random(20));
            User::where('email', $request->email)->update(['remember_token' => $token]);
            $data = [
                'name' => $email->fullname,
                'id' => $email->id,
                'remember_token' => $token
            ];
            Mail::to($email->email)->send(new ChangePassword($data));
            return view('account.forgotPassword')->with('message_success', 'Email sent successfully, please check your inbox');
        }
    }
    public function getFormNewPassword($id, $token){
        $user = User::where('id', $id)->first();
        if($user->remember_token == $token){
            return view('account.newPassword', compact('id'));
        }else{
            return view('account.forgotPassword')->with('message_success', 'Link has expired, please try again');
        }
    }
    public function submitFormNewPassword(Request $request){
        $token2 = strtoupper(Str::random(20));
        User::where('id', $request->id)->update([
            'remember_token' => $token2,
            'password' => Hash::make($request->password)
        ]);
        return view('account.login')->with('message_success', 'Change password successfully, please login');
    }

    //Admin
    public function index(){
        return view('admin.account.list');
    }
    public function getFormAdd(){
        return view('admin.account.add');
    }
    public function getFormEdit(){
        return view('admin.account.edit');
    }
}
