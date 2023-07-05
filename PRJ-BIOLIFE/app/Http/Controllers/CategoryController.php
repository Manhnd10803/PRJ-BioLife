<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::get();
        return view('admin.category.list', compact('category'));
    }
    public function getFormAdd(){
        return view('admin.category.add');
    }
    public function submitFormAdd(Request $request){
        $category = new Category();
        $category->nameCategory = $request->name;
        $category->iconCategory = $request->icon;
        $category->save();
        if($category instanceof Model){
            toastr()->success('Successfully', 'Added product');
            return redirect()->route('admin.category.list');
        }
        return redirect()->back();
    } 
    public function getFormEdit($idCategory){
        $category = DB::table('categories')->where('idCategory', '=', $idCategory)->first();
        return view('admin.category.edit',compact('category'));
    }
    public function submitFormEdit(Request $request, $idCategory){
        DB::table('categories')->where('idCategory', '=' , $idCategory)->update([
            'nameCategory' => $request->name,
            'iconCategory' => $request->icon
        ]);
        toastr()->success('Successfully', 'Updated category');
        return redirect()->route('admin.category.list');
    }
    public function softDelete($idCategory){
        DB::table('categories')->where('idCategory', '=', $idCategory)->update(['deleted_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
        toastr()->success('Successfully', 'Deleted category');
        return redirect()->route('admin.category.list');
    }
}

