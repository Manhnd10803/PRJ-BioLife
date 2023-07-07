<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function addToCart($idProduct){
        //TH khách vãng lai vào mua hàng
        if(!Auth::check()){
            $product = DB::table('products')->where('idProduct', '=', $idProduct)->first();
            $product->srcImage = DB::table('images')->where('idProduct', '=', $idProduct)->first()->srcImage;
            //TH đã tồn tại session cart, nếu chưa tồn tại tạo session cart rồi mới thêm product
            if(session()->has('cart')){
                //TH thêm product đã có trong giỏ hàng (cộng số lượng)
                $check = true;
                foreach(Session::get('cart') as $item){
                    if($item->idProduct == $idProduct){
                        $item->qtyInCart = $item->qtyInCart + 1;
                        $check = false;
                        break;
                    }
                }
                // TH thêm product chưa có trong giỏ hàng
                if($check == true){
                    $product->qtyInCart = 1;
                    Session::push('cart', $product);
                }
            }else{
                Session::put('cart');
                $product->qtyInCart = 1;
                Session::push('cart', $product);
            }
            return redirect()->back();
        }else{
            //TH khách có tài khoản vào mua hàng
            $idUser = Auth::user()->id;
            $product = DB::table('products')->where('idProduct', '=', $idProduct)->first();
            $product->srcImage = DB::table('images')->where('idProduct', '=', $idProduct)->first()->srcImage;
            //TH đã tồn tại session cart, nếu chưa tồn tại tạo session cart rồi mới thêm product
            if(session()->has('cart')){
                //TH thêm product đã có trong giỏ hàng (cộng số lượng)
                $check = true;
                foreach(Session::get('cart') as $item){
                    if($item->idProduct == $idProduct){
                        $item->qtyInCart = $item->qtyInCart + 1;
                        $check = false;
                        DB::table('carts')->where('idProduct', '=', $idProduct)->update(
                            [
                                'quantityCart' => $item->qtyInCart,
                            ]);
                        break;
                    }
                }
                // TH thêm product chưa có trong giỏ hàng
                if($check == true){
                    $product->qtyInCart = 1;
                    Session::push('cart', $product);
                    DB::table('carts')->insert(
                        [
                            'quantityCart' => 1,
                            'idProduct' => $idProduct,
                            'idUser' => $idUser,
                        ]);
                }
            }else{
                Session::put('cart');
                $product->qtyInCart = 1;
                Session::push('cart', $product);
                DB::table('carts')->insert(
                    [
                        'quantityCart' => 1,
                        'idProduct' => $idProduct,
                        'idUser' => $idUser,
                    ]);
            }
            return redirect()->back();
        }
    }
    public function viewCart(){
        $billTotal = 0;
        foreach(Session::get('cart') as $item){
            $item->total = $item->qtyInCart * $item->priceSaleProduct;
            $billTotal += $item->total;
        }
        return view('cart.cart', compact('billTotal'));
    }
    public function checkOut(){
        $billTotal = 0;
        foreach(Session::get('cart') as $item){
            $item->total = $item->qtyInCart * $item->priceSaleProduct;
            $billTotal += $item->total;
        }
        return view('cart.checkOut', compact('billTotal'));
    }
    public function submitCheckOut(Request $request){
        //TH khách vãng lai
        if(!Auth::check()){
            DB::table('bills')->insert([
                'fullnameBill' => $request->name,
                'phoneBill' => $request->phone,
                'emailBill' => $request->email,
                'addressBill' => $request->address,
                'paymentMethodBill' => $request->payment,
                'statusBill' => 1,
                'dateBill' => Carbon::now('Asia/Ho_Chi_Minh'),
                'totalBill' => $request->billTotal
            ]);
            $idBill = DB::table('bills')->orderByDesc('idBill')->first()->idBill;
            foreach(Session::get('cart') as $item){
                DB::table('carts')->insert([
                    'quantityCart' => $item->qtyInCart,
                    'idProduct' => $item->idProduct,
                    'idBill' => $idBill,
                ]);
            }
            Session::forget('cart');
            Session::put('cart');
        }else{
            // TH khách đã đăng nhập
            DB::table('bills')->insert([
                'fullnameBill' => $request->name,
                'phoneBill' => $request->phone,
                'emailBill' => $request->email,
                'addressBill' => $request->address,
                'paymentMethodBill' => $request->payment,
                'statusBill' => 1,
                'dateBill' => Carbon::now('Asia/Ho_Chi_Minh'),
                'totalBill' => $request->billTotal
            ]);
            $idBill = DB::table('bills')->orderByDesc('idBill')->first()->idBill;
            //Cập nhật id bill cho những sản phẩm trong giỏ khi đã thanh toán
            $carts = DB::table('carts')->where('idUser', '=', Auth::user()->id)->get();
            foreach($carts as $item){
                if($item->idBill == null){
                    DB::table('carts')->where('idCart', '=', $item->idCart)->update(['idBill' => $idBill]);
                }
            }
            Session::forget('cart');
            Session::put('cart');
        }
        return view('cart.billSuccess');
    }
    // public function updateQuantityInCart(Request $request){
    //     dd($request);
    //     // TH khách vãng lai
    //     if(!Auth::check()){
    //         //lấy ra mảng id
    //         foreach(Session::get('cart') as $cart){
    //             foreach($request as $key => $value){
    //                 return $key;
    //                 if($cart->idProduct == $key){
    //                     $cart->qtyInCart = $value;

    //                 }
    //             }
    //         }
    //     }else{

    //     }
    //     return redirect()->back();
    //     // dd($request);
    // }
}
