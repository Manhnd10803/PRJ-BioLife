<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function index(){
        $bill = Bill::get();
        return view('admin.bill.list', compact('bill'));
    }
    public function getFormDetail($idBill){
        $bill = DB::table('bills')->where('idBill', '=', $idBill)->first();
        $images = DB::table('images')->get();
        $idProducts = DB::table('carts')->where('idBill', '=', $idBill)->get('idProduct');
        $arrayProduct = [];
        foreach($idProducts as $idProduct){
            $product = DB::table('products')->where('idProduct', '=', $idProduct->idProduct)->first();
            array_push($arrayProduct, $product);
            $cart = DB::table('carts')->where('idBill','=',$idBill)->first();
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
        return view('admin.bill.detailBill',compact('bill','arrayProduct','cart'));
    }
    public function submitFormDetail(Request $request, $idBill){
        DB::table('bills')->where('idBill', '=' , $idBill)->update([
            'statusBill' => $request->status
        ]);
        toastr()->success('Successfully', 'Updated bill');
        return redirect()->route('admin.bill.list');
    }
}
