<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    public function index(){
        $images = Image::get();
        $products = Product::join('categories', 'products.idCategory', '=', 'categories.idCategory')->get();

        //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
        foreach($products as $product){
            foreach($images as $image){
                if($image->idProduct == $product->idProduct ){
                    $product->srcImage = $image->srcImage;
                    break;
                }
            }
        };
        return view('admin.product.list', compact('products'));
    }
    public function getFormAdd(){
        $category = Category::get();
        return view('admin.product.add', compact('category'));
    }
    public function submitFormAdd(Request $request){
        $request->validate([
            'description' => 'required',
            'images' => 'required'
        ]);
        $product = new Product();
        $product->nameProduct = $request->name;
        $product->priceProduct = $request->price;
        $product->priceSaleProduct = $request->discounts;
        $product->weightProduct = $request->weight;
        $product->mfgProduct = $request->mfg;
        $product->expProduct = $request->exp;
        $product->originProduct = $request->origin;
        $product->descriptionProduct = $request->description;
        $product->idCategory = $request->category;
        $product->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $product->updated_at = null;
        $product->save();
        $idProduct = Product::orderBy('idProduct', 'DESC')->first();
        $array_path = $this->uploadImage($request);
        foreach($array_path as $path){
            $image = new Image();
            $image->srcImage = $path;
            $image->idProduct = $idProduct->idProduct;
            $image->save();
        }
        if($product instanceof Model){
            toastr()->success('Successfully', 'Added product');
            return redirect()->route('admin.product.list');
        }
        return redirect()->back();
    }
    public function uploadImage(Request $request){
        $array_path = [];
        //Xử lí upload nhiều ảnh
        foreach($request->images as $image){
            //lấy ra đường dẫn sau khi lưu đc ảnh
            $path = $image->store('public/images/products');
            //đường dẫn đc bỏ đi "public/" và thêm vào mảng đường dẫn
            array_push($array_path, substr($path, strlen('public/')));
        }
        return $array_path;
    }
    public function getFormEdit($id){
        $product = DB::table('products')->where('idProduct', '=', $id)->first();
        $images = DB::table('images')->where('idProduct', '=', $id)->get();
        $category = Category::get();
        return view('admin.product.edit', compact('product', 'images', 'category'));
    }
    public function submitFormEdit(Request $request, $idProduct){
        $request->validate([
            'description' => 'required',
        ]);
        DB::table('products')->where('idProduct', '=', $idProduct)->update([
            'nameProduct' => $request->name,
            'priceProduct' => $request->price,
            'priceSaleProduct' => $request->discounts,
            'weightProduct' => $request->weight,
            'mfgProduct' => $request->mfg,
            'expProduct' => $request->exp,
            'originProduct' => $request->origin,
            'descriptionProduct' => $request->description,
            'idCategory' => $request->category,
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        //TH có update ảnh
        if($request->file('images')){
            //xóa ảnh cũ
            DB::table('images')->where('idProduct', '=', $idProduct)->delete();
            //upload ảnh mới
            $array_path = $this->uploadImage($request);
            foreach($array_path as $path){
                $image = new Image();
                $image->srcImage = $path;
                $image->idProduct = $idProduct;
                $image->save();
            }
        }
        toastr()->success('Successfully', 'Updated product');
        return redirect()->route('admin.product.list');
    }
    public function softDelete($idProduct){
        DB::table('products')->where('idProduct', '=', $idProduct)->update(['deleted_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
        toastr()->success('Successfully', 'Deleted product');
        return redirect()->route('admin.product.list');
    }
}
