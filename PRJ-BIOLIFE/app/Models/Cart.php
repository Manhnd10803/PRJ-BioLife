<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    //Relation sang bảng bill
    public function bill(){
        return $this->belongsTo(Bill::class, 'idBill', 'idBill');
    }
}
