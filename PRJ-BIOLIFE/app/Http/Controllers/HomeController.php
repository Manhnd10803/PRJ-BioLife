<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::get();
        //đưa 3 sản phẩm hot làm banner
        $productsBanner = DB::table('products')->orderByDesc('viewProduct')->limit(3)->get();
        // dd($productsBanner);
        $images = Image::get();
        //Ảnh đại diện cho mỗi sản phẩm
        foreach($productsBanner as $productBanner){
            foreach($images as $image){
                if($image->idProduct == $productBanner->idProduct ){
                    $productBanner->srcImage = $image->srcImage;
                    break;
                }
            }
        };
        return view('index', compact('categories', 'productsBanner'));
    }
    public function productList(){
        $images = Image::get();
        $categories = Category::get();
        $products = Product::join('categories', 'products.idCategory', '=', 'categories.idCategory')->get();
        //top 10 sản phẩm có lượt xem nhiều
        $hotProducts = Product::join('categories', 'products.idCategory', '=', 'categories.idCategory')->orderByDesc('viewProduct')->limit(10)->get();
        //Ảnh đại diện cho mỗi sản phẩm trong top 10
        foreach($hotProducts as $hotProduct){
            foreach($images as $image){
                if($image->idProduct == $hotProduct->idProduct ){
                    $hotProduct->srcImage = $image->srcImage;
                    break;
                }
            }
        };
        
        $products = Product::paginate(9);
        // => Khi phân trang thì ảnh sản phẩm không hiển thị được
        // Gán ảnh cho product
        foreach($products as $product){
            foreach($images as $image){
                if($image->idProduct == $product->idProduct ){
                    $product->srcImage = $image->srcImage;
                    break;
                }
            }
        }

        return view('product.productList', compact('products', 'categories', 'hotProducts'));
    }
    public function productDetail($idProduct){
        $product = DB::table('products')->where('idProduct', '=', $idProduct)->join('categories', 'products.idCategory', '=', 'categories.idCategory')->first();
        $imagesProduct = DB::table('images')->where('idProduct', '=', $idProduct)->get();
        //Tăng số lượt xem
        $view = DB::table('products')->where('idProduct', '=', $idProduct)->first('viewProduct');
        $view = $view->viewProduct + 1;
        DB::table('products')->where('idProduct', '=', $idProduct)->update(['viewProduct' =>  $view]);
        //Top 10 sản phẩm cùng loại có view cao
        $relatedProducts = Product::where('products.idCategory', '=', $product->idCategory)->where('products.idProduct', '<>', $idProduct)->join('categories', 'products.idCategory', '=', 'categories.idCategory')->orderByDesc('viewProduct')->limit(10)->get();
         //Ảnh đại diện cho mỗi sản phẩm trong top 10
        $images = Image::get();
        foreach($relatedProducts as $relatedProduct){
            foreach($images as $image){
                if($image->idProduct == $relatedProduct->idProduct ){
                    $relatedProduct->srcImage = $image->srcImage;
                    break;
                }
            }
        };
        return view('product.productDetail', compact('product', 'imagesProduct', 'relatedProducts'));
    }
    public function productCategory($idCategory){
        $images = Image::get();
        $products = Product::where('products.idCategory', '=', $idCategory)->join('categories', 'products.idCategory', '=', 'categories.idCategory')->get();

        // Phân trang
        $products = Product::where('idCategory', $idCategory)->paginate(9);
        
        //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
        foreach($products as $product){
            foreach($images as $image){
                if($image->idProduct == $product->idProduct ){
                    $product->srcImage = $image->srcImage;
                    break;
                }
            }
        };
        //top 10 sản phẩm có lượt xem nhiều
        $hotProducts = Product::where('products.idCategory', '=', $idCategory)->join('categories', 'products.idCategory', '=', 'categories.idCategory')->orderByDesc('viewProduct')->limit(10)->get();
        //Ảnh đại diện cho mỗi sản phẩm trong top 10
        foreach($hotProducts as $hotProduct){
            foreach($images as $image){
                if($image->idProduct == $hotProduct->idProduct ){
                    $hotProduct->srcImage = $image->srcImage;
                    break;
                }
            }
        };
        //Khi không tồn tại sản phẩm thuộc danh mục này
        if(!isset($products[0])){
            return redirect('/');
        }
        
        return view('product.productCategory', compact('products', 'hotProducts'));
    }
    public function productSearch(Request $request){
        if($request->kyw != '' && $request->category > 0){
            $images = Image::get();
            $categories = Category::get();
            $products = Product::where('products.nameProduct', 'like', "%".$request->kyw."%")->where('products.idCategory', '=', $request->category)->join('categories', 'products.idCategory', '=', 'categories.idCategory')->paginate(9);
             
            // $products = Product::where('idCategory', $request->idCategory)->paginate(9);
            //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
            foreach($products as $product){
                foreach($images as $image){
                    if($image->idProduct == $product->idProduct ){
                        $product->srcImage = $image->srcImage;
                        break;
                    }
                }
            };
            return view('product.productSearch', compact('products', 'categories'));
        }
        if($request->kyw == '' && $request->category > 0){
            $images = Image::get();
            $categories = Category::get();
            $products = Product::where('products.idCategory', '=', $request->category)->join('categories', 'products.idCategory', '=', 'categories.idCategory')->paginate(9);
            
            // $products = Product::where('idCategory', $request->idCategory)->paginate(9);
            //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
            foreach($products as $product){
                foreach($images as $image){
                    if($image->idProduct == $product->idProduct ){
                        $product->srcImage = $image->srcImage;
                        break;
                    }
                }
            };
            return view('product.productSearch', compact('products', 'categories'));
        }
        if($request->kyw != '' && $request->category < 0){
            $images = Image::get();
            $categories = Category::get();
            $products = Product::where('products.nameProduct', 'like', "%".$request->kyw."%")->join('categories', 'products.idCategory', '=', 'categories.idCategory')->paginate(9);
            
            // $products = Product::where('idCategory', $request->idCategory)->paginate(9);
            //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
            foreach($products as $product){
                foreach($images as $image){
                    if($image->idProduct == $product->idProduct ){
                        $product->srcImage = $image->srcImage;
                        break;
                    }
                }
            };
            return view('product.productSearch', compact('products', 'categories'));
        }
        if($request->kyw == '' && $request->category < 0){
            $images = Image::get();
            $categories = Category::get();
            $products = Product::join('categories', 'products.idCategory', '=', 'categories.idCategory')->paginate(9);
            
            // $products = Product::where('idCategory', $request->idCategory)->paginate(9);
            //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
            foreach($products as $product){
                foreach($images as $image){
                    if($image->idProduct == $product->idProduct ){
                        $product->srcImage = $image->srcImage;
                        break;
                    }
                }
            };
            return view('product.productSearch', compact('products', 'categories'));
        }
    }
    public function filterInputPrice(Request $request)
    {
        $images = Image::get();
        $categories = Category::get();

        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $products = Product::whereBetween('priceProduct', [$minPrice, $maxPrice])->paginate(9);

        $hotProducts = Product::join('categories', 'products.idCategory', '=', 'categories.idCategory')->orderByDesc('viewProduct')->limit(10)->get();
        //Ảnh đại diện cho mỗi sản phẩm trong top 10
        foreach($hotProducts as $hotProduct){
            foreach($images as $image){
                if($image->idProduct == $hotProduct->idProduct ){
                    $hotProduct->srcImage = $image->srcImage;
                    break;
                }
            }
        };
        foreach($products as $product){
                foreach($images as $image){
                    if($image->idProduct == $product->idProduct ){
                        $product->srcImage = $image->srcImage;
                        break;
                    }
                }
            };
        return view('product.productList', compact('products','categories','hotProducts'));
    }
    public function filterCheckboxPrice($minPrice, $maxPrice)
    {
        $images = Image::get();
        $categories = Category::get();

        $products = Product::whereBetween('priceProduct', [$minPrice, $maxPrice])->paginate(9);

        $hotProducts = Product::join('categories', 'products.idCategory', '=', 'categories.idCategory')->orderByDesc('viewProduct')->limit(10)->get();
        //Ảnh đại diện cho mỗi sản phẩm trong top 10
        foreach($hotProducts as $hotProduct){
            foreach($images as $image){
                if($image->idProduct == $hotProduct->idProduct ){
                    $hotProduct->srcImage = $image->srcImage;
                    break;
                }
            }
        };
        foreach($products as $product){
                foreach($images as $image){
                    if($image->idProduct == $product->idProduct ){
                        $product->srcImage = $image->srcImage;
                        break;
                    }
                }
            };
        return view('product.productList', compact('products','categories','hotProducts'));
    }
}
