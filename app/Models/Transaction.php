<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = ['*'];
    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;
    public function user()
    {
    	return $this->belongsTo(User::class,'tr_user_id');
    }
    protected $status = [
        1 => [
            'name' => 'Đã xử lý',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Chưa xử lý',
            'class'=> 'label-default'
        ]
    ];
    public function getStatus()
    {
    	return array_get($this->status,$this->tr_status,'[N\A]');//$this->c_status = 1 or 0
    }	
}
