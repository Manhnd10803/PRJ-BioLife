<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.list');
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
            return view('admin.category.list');
        }
        return redirect()->back();
    } 
    public function getFormEdit($id){
        $category =  Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    public function submitFormEdit(Request $request, $id){
        $category = Category::findOrFail($id);
        $data = $request->all();
        Category::update($data);
    }
    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        if($category instanceof Model){
            return view('admin.category.list');
        }
        return redirect()->back();
    }
}

