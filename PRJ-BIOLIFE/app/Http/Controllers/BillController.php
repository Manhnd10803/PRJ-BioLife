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
        return view('admin.bill.detailBill',compact('bill'));
    }
    public function submitFormDetail(Request $request, $idBill){
        DB::table('bills')->where('idBill', '=' , $idBill)->update([
            'statusBill' => $request->status
        ]);
        toastr()->success('Successfully', 'Updated bill');
        return redirect()->route('admin.bill.list');
    }
}
