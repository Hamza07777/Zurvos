<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_orders';

    public function product_name(){

        return $this->belongsTo(Product::class,'product_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    
      public function user_name()
    {
        return $this->belongsTo(Customer::class,'user_id');
    }
}
