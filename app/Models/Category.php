<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = ['*'];
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const HOME = 1;
    protected $status = [
    	1 => [
            'name' => 'Public',
            'class' => 'label-danger'
        ],
        0 => [
            'name' => 'Private',
            'class'=> 'label-default'
        ]
    ];
     protected $home = [
        1 => [
            'name' => 'Public',
            'class' => 'label-primary'
        ],
        0 => [
            'name' => 'Private',
            'class'=> 'label-default'
        ]
    ];
    public function getStatus()
    {
    	return array_get($this->status,$this->c_active,'[N\A]');
    }
    public function getHome()
    {
        return array_get($this->home,$this->c_home,'[N\A]');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'pro_category_id');
    }
} 
