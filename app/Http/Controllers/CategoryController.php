<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class CategoryController extends FrontendController
{
     public function __construct()
    {
        parent::__construct();
    }
    
    public function getListProduct(Request $request)
    {
    	$url = $request->segment(2);
    	$url = preg_split('/(-)/i',$url);

        $products = Product::where('pro_active',Product::STATUS_PUBLIC);
        $cateProduct = [];
    	if ($id = array_pop($url))
         {
		  $cateProduct = Category::find($id);
          $products->where('pro_category_id',$id);
    	 }

        if ($request->k) 
        {
            $products->where('pro_name','like','%'.$request->k.'%');
        }

        if ($request->price) 
        {
            $price = $request->price;
            switch ($price) {
                case '1':
                    $products->where('pro_price','<',1000000);
                    break;
                case '2':
                    $products->whereBetween('pro_price',[1000000,3000000]);
                    break;
                case '3':
                    $products->whereBetween('pro_price',[3000000,5000000]);
                    break;
                case '4':
                    $products->whereBetween('pro_price',[5000000,7000000]);
                    break;
                 case '5':
                    $products->whereBetween('pro_price',[7000000,10000000]);
                    break;    
                case '6':
                    $products->where('pro_price','>',10000000);
                    break;

            }
        }

         if ($request->orderby) 
        {
            $orderby = $request->orderby;
            switch ($orderby) {
                case 'desc':
                    $products->orderBy('id','DESC');
                    break;
                case 'asc':
                    $products->orderBy('id','ASC');
                    break;
                case 'price_max':
                    $products->orderBy('pro_price','ASC');
                    break; 
                case 'price_min':
                    $products->orderBy('pro_price','DESC');
                    break; 
                default:
                    $products->orderBy('id','DESC');            
            }
        }
        $products = $products->paginate(3);
		$viewData = [
			'products' => $products,
            'cateProduct' => $cateProduct,
            'query'    => $request->query()
		];
		return view('product.index',$viewData);
 	}
 }   	