<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class FrontendController extends Controller
{
    public function __construct()
    {
    	$categories = Category::where('c_active',Category::STATUS_PUBLIC)->get();
        View::share('categories', $categories);
        //share a piece of data with all views , view::share thuong dat trong _construct or method boot
    }
}
