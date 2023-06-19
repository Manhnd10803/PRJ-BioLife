<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.list');
    }
    public function getFormAdd(){
        return view('admin.product.add');
    }
    public function submitFormAdd(Request $request){
        dd($request->description);
    }
    public function getFormEdit(){
        return view('admin.product.edit');
    }
    public function submitFormEdit(){
        // return view('admin.product.edit');
    }
}
