<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
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
                $carts = DB::table('carts')->where('idUser', '=', $user->id)->get();
                // Lọc ra sản phẩm chưa được thanh toán 
                $filter_cart = [];
                foreach($carts as $item){
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
                if($user->role == 1 || $user->role == 2){
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

    // Admin 
    public function index(){
        // $users = User::paginate(10);
        $users = User::all();
        return view('admin.account.list', compact('users'));
    }
    public function getFormAdd(){
        return view('admin.account.add');
    }
    function submitFormAdd(Request $request) {
        $request->validate([
            'username' => "required",
            'fullname' => "required",
            'email' => "required|unique:users|email",
            'address' => "required",
            'phone_number' => "required",
            'password' => "required|min:8|max:32",
            'repeat_password' => "same:password",
            'role' => "required",
        ]);
        // Role nhân viên không thể thêm role AD và NV, role nhân viên chỉ có thể thêm role khách hàng
        if(Auth::user()->role == 2){
            if($request->role == 1 || $request->role == 2){
                toastr()->error('Error', 'Not qualified to perform');
                return redirect()->back();
            }
        }
        $user = new User();
        $user->name = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        toastr()->success('Successfully', 'Created account');
        return redirect()->route('admin.account.list');
    }
    public function getFormEdit($id){
        $user = User::find($id);
        return view('admin.account.edit', compact('user'));
    }
    function submitFormEdit(Request $request , $id) {
        $request->validate([
            'username' => "required",
            'fullname' => "required",
            'email' => "required|email",
            'address' => "required",
            'phone_number' => "required",
            'role' => "required",
        ]);
        $user = User::find($id);
        // dd($user);
        if(Auth::user()->role == 2){
            $currentPassword = $request->input('password');
            $newPassword = $request->input('new_password');
            // Kiểm tra pass
            if(Hash::check($currentPassword,$user->password)){
                //TH nhân viên sửa cho khách hàng (không thể sửa thành NV và AD)
                if($user->role == 0){
                    if($request->role == 1 || $request->role == 2){
                        toastr()->error('Error', 'Not qualified to perform');
                        return redirect()->back();
                    }
                }
                //TH nhân viên sửa cho nhân viên (không thể sửa thành AD và KH)
                if($user->role == 2){
                    if($request->role == 1 || $request->role == 0){
                        toastr()->error('Error', 'Not qualified to perform');
                        return redirect()->back();
                    }
                }
                $data = [
                    'name' => $request->username,
                    'fullname' => $request->fullname,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone_number,
                    'role' => $request->role,
                ];
                // Kiểm tra khi nhập new_password
                if (!empty($newPassword)) {
                    $user->password = Hash::make($newPassword);
                }
                $user->update($data);
                toastr()->success('Successfully', 'Updated account');
                return redirect()->route('admin.account.list');
            }else{
                toastr()->error('Errors', 'You must enter the exact password of this account to be able to update this account.');
                return back();
            }
        }else if(Auth::user()->role == 1){
            //TH role admin (hoàn toàn có thể update mà không cần mk)
            $data = [
                'name' => $request->username,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone_number,
                'role' => $request->role,
            ];
            if($request->new_password != null){
                $user->password = Hash::make($request->new_password);
            };
            $user->update($data);
            toastr()->success('Successfully', 'Updated account');
            return redirect()->route('admin.account.list');
        }
    }
    function deleteUser($id) {
        $user = User::find($id);
        if(!is_null($user)){
            // Không thể tự xóa chính mình
            if(Auth::user()->id == $id){
                toastr()->error('Error', 'Not qualified to perform');
                return redirect()->back();
            }else{
                // NV không thể xóa AD, NV, KH
                if(Auth::user()->role == 2){
                    toastr()->error('Error', 'Not qualified to perform');
                    return redirect()->back();
                }
                $user->delete();
            }
        }
        toastr()->success('Successfully', 'Deleted account');
        return redirect()->route('admin.account.list');
    }
}
