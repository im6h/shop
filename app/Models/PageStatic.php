<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageStatic extends Model
{
    protected $guarded = [''];
    const TYPE_ABOUT = 1;
    const TYPE_INFO_SHOPPING = 2;
    const TYPE_BAOMAT = 3;
    const TYPE_DIEUKHOAN = 4;
}
