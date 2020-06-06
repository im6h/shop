<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     protected $table = 'articles';
    protected $guarded = [''];
    //$guarded = [''] cho phep tat ca cac thuoc tinh deu mass assignment
    // Lỗi bảo mật mass-assignment xảy ra khi một user truyền vào một tham số HTTP không mong muốn trong request, và tham số đó sẽ có thể thay đổi một column trong database mà bạn không ngờ tới.
    const HOT = 1;
    const PUBLIC = 1;
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
     protected $hot = [
        1 => [
            'name' => 'Hot',
            'class' => 'label-danger'
        ],
        0 => [
            'name' => 'None',
            'class'=> 'label-default'
        ]
    ];
    public function getStatus()
    {
    	return array_get($this->status,$this->a_active,'[N\A]');//$this->a_active = 1 or 0
    }
     public function getHot()
    {
        return array_get($this->hot,$this->a_hot,'[N\A]');//$this->a_active = 1 or 0
    }
}
