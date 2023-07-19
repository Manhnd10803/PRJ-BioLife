<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Mail\OrderConfirmation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Bill;
use App\Models\Product;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Stringable;

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
        if(Session::get('cart') != null){
            $billTotal = 0;
            foreach(Session::get('cart') as $item){
                $item->total = $item->qtyInCart * $item->priceSaleProduct;
                $billTotal += $item->total;
            }
            return view('cart.cart', compact('billTotal'));
        }
        return view('cart.cart')->with('message', 'No product in your shopping cart');
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
            
            $images = DB::table('images')->get();
            $idProducts = DB::table('carts')->where('idBill', '=', $idBill)->get('idProduct');
            $carts = DB::table('carts')->where('idBill','=',$idBill)->get();
            // dd($carts);
            $arrayProduct = [];

            foreach($idProducts as $idProduct){
                $product = DB::table('products')->where('idProduct', '=', $idProduct->idProduct)->first();
                foreach($carts as $cart){
                    if($cart->idProduct == $idProduct->idProduct){
                        $product->quantity = $cart->quantityCart;
                        break;
                    }
                }
                array_push($arrayProduct, $product);
            }

            //Thêm ảnh đầu tiên làm ảnh đại diện cho sản phẩm
            foreach($arrayProduct as $product){
                foreach($images as $image){
                    if($image->idProduct == $product->idProduct ){
                        $product->srcImage = $image->srcImage;
                        break;
                    }
                }
            };
        
            //Lấy thông tin khách hàng
            $fullname = $request->name;
            $phone = $request->phone;
            $email = $request->email;
            $address = $request->address;
            $paymentMethod = $request->payment;
            $total = $request->billTotal;

            // Gửi email xác nhận đơn hàng
            Mail::to($request->email)->send(new OrderConfirmation($fullname, $phone, $email, $address, $paymentMethod, $total,$arrayProduct));
            
            Session::forget('cart');
            Session::put('cart');
        }
        return view('cart.billSuccess');
    }
    public function updateQuantityInCart(Request $request){
        // TH khách vãng lai
        if(!Auth::check()){
            //Cập nhật số lượng lần lượt sản phẩm trong cart
            $i = 0;
            foreach(Session::get('cart') as $cart){
                $cart->qtyInCart = $request->$i;
                $i++;
            }
        }else{
            // TH khách đã đăng nhập
            $i = 0;
            foreach(Session::get('cart') as $cart){
                $cart->qtyInCart = $request->$i;
                Cart::where('idProduct', $cart->idProduct)->where('idUser', Auth::user()->id)->where('idBill', '=', null)->update(['quantityCart' => $cart->qtyInCart]);
                $i++;
            }
        }
        return redirect()->route('viewCart');
    }
    public function deleteAProductInCart($idProduct){
        // dd(Session::get('cart'));
        //TH khách vãng lai
        if(!Auth::check()){
            $oldCart = Session::get('cart');
            Session::forget('cart');
            Session::put('cart');
            foreach($oldCart as $cart){
                if($cart->idProduct != $idProduct){
                    Session::push('cart', $cart);
                }
            }
        }else{
            //TH khách đăng nhập tài khoản
            //Xóa sản phẩm trong giỏ hàng trên db
            Cart::where('idProduct', $idProduct)->where('idUser', Auth::user()->id)->where('idBill', '=', null)->delete();
            //Xóa trong giỏ session
            $oldCart = Session::get('cart');
            Session::forget('cart');
            Session::put('cart');
            foreach($oldCart as $cart){
                if($cart->idProduct != $idProduct){
                    Session::push('cart', $cart);
                }
            }
        }
        return redirect()->route('viewCart');
    }
    public function deleteAllProductInCart(){
        if(!Auth::check()){
            Session::forget('cart');
            Session::put('cart');
        }else{
            Session::forget('cart');
            Session::put('cart');
            Cart::where('idUser', Auth::user()->id)->where('idBill', '=', null)->delete();
        }
        return redirect()->route('viewCart');
    }
    public function orderLookup(){
        $idUser = Auth::user()->id;
        //Lấy ra thông tin đơn hàng kèm theo số lượng sản phẩm trong đơn 
        $bills = Cart::select(DB::raw('count(`carts`.`idBill`) as quantityProduct'), 'carts.idBill')->where('carts.idUser', '=', $idUser)->join('bills', 'carts.idBill', '=', 'bills.idBill')->groupBy('carts.idBill')->orderBy('carts.idBill', 'DESC')->get();
        $bills->load('bill');
        return view('cart.orderLookup', compact('bills'));
    }
    public function orderDetail($idBill){
        $images = Image::get();
        $bill = Bill::where('idBill', $idBill)->first();
        $carts = Cart::Where('idBill', $idBill)->get();
        //Lấy ra sản phẩm trong bill
        $products = [];
        $total = 0;
        foreach($carts as $cart){
            $product = Product::where('idProduct', $cart->idProduct)->first();
            $product->quantity = $cart->quantityCart;
            $total += $product->quantity * $product->priceSaleProduct;
            array_push($products, $product);
        };
        //Lấy ảnh đại diện cho sản phẩm
        foreach($products as $product){
            foreach($images as $image){
                if($image->idProduct == $product->idProduct ){
                    $product->srcImage = $image->srcImage;
                    break;
                }
            }
        }
        // dd($products);
        return view('cart.detailOrder', compact('bill', 'products', 'total'));
    }
    public function confirmReceived($idBill){
        $bill = Bill::where('idBill', $idBill)->first();
        if($bill->statusBill == 6){
            DB::table('bills')->where('idBill', $idBill)->update(['statusBill' => 7]);
            return redirect()->route('orderLookup');
        }else{
            return view('errors.404');
        }
    }
}
