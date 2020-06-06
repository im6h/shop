<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = ['*'];
   	public function product()
   	{
   		return $this->belongsTo(Product::class,'or_product_id');
   	}
}
