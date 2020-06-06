<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Category;
class AdminWarehouseController extends Controller
{
   public function getWarehouseProduct(Request $request)
   {

        $products = Product::with('category:id,c_name');

        $column = 'id';
        if ($request->type && $request->type == 'pay') {
            $column = 'pro_pay';
            $products->where('pro_pay','>=',0);
        }
        else{
            $products->where('pro_number','>=',10);
        }
        //select*from products
        //select id, c_name from category 
        if($request->name) $products->where('pro_name','like','%'.$request->name.'%');
        if($request->cate) $products->where('pro_category_id',$request->cate);
        //cate va name la ten class = "name", class= "cate" ben index
        $products = $products->orderByDesc($column)->paginate(10);
        //orderByDesc sap xep giam dan , orderByAsc la tang dan
        $categories = $this->getCategories();
        $viewData = [
            'products' => $products,
            'categories' =>$categories
        ];
        return view('admin::warehouse.index',$viewData);
   }
    public function getCategories()
   {
        return Category::all();
   }
}
