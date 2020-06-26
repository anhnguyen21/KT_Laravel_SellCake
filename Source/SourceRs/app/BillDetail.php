<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table='bill_detail';
    public function billToBillDetail(){
        return $this->belongsTo('App\Bill','bills_id','id');
    }
    public function productToBillDetail(){
        return $this->belongsTo('App\Bill','products_id','id');
    }
}
