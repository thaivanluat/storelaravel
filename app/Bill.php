<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
     protected $table ="bills";

     public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_bill','id');
    } 
    public function Customer(){
    	return $this->belongsTo('App\Customr','id_customer','id');
    }
}
