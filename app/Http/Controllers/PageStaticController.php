<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageStatic;
class PageStaticController extends FrontendController
{
	public function __construct()
	{
		parent::__construct();
	}
    public function aboutUs()
    {
    	$page = PageStatic::where('ps_type',PageStatic::TYPE_ABOUT)->first();
    	return view('static.about',compact('page'));
    }
    public function infoShopping()
    {
    	$page = PageStatic::where('ps_type',PageStatic::TYPE_INFO_SHOPPING)->first();
    	return view('static.infoShopping',compact('page'));
    }
    public function security()
    {
    	$page = PageStatic::where('ps_type',PageStatic::TYPE_BAOMAT)->first();
    	return view('static.security',compact('page'));
    }
    public function rules()
    {
    	$page = PageStatic::where('ps_type',PageStatic::TYPE_DIEUKHOAN)->first();
    	return view('static.rule',compact('page'));
    }
}
