<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Category;
// use App\Models\Supplier;
use App\Models\Product;
class AdminProductController extends Controller
{
   public function index(Request $request)
   {
        $products = Product::with('category:id,c_name');
        //select*from products
        //select id, c_name from category 
        if($request->name) $products->where('pro_name','like','%'.$request->name.'%');
        if($request->cate) $products->where('pro_category_id',$request->cate);
        //cate va name la ten class = "name", class= "cate" ben index
        $products = $products->orderByDesc('id')->paginate(10);
        //orderByDesc sap xep giam dan , orderByAsc la tang dan
        $categories = $this->getCategories();
        $viewData = [
            'products' => $products,
            'categories' =>$categories
        ];
        return view('admin::product.index',$viewData);
   }
   public function create()
   {
        // $suppliers = $this->getSuppliers();
        $categories = $this->getCategories();//truyen cac loai san pham vao o select ben create.blade.php 
        $data = [
          // 'suppliers' => $suppliers,
          'categories' => $categories
        ];
        return view('admin::product.create',$data);
   }
   public function store(RequestProduct $requestProduct)
   {
       $this->insertOrUpdate($requestProduct);
       return redirect()->back()->with('success','Thêm mới thành công');
   }
   public function edit($id)
   {
      $product = Product::find($id);
      $categories = $this->getCategories();
      // $suppliers = $this->getSuppliers();
      return view('admin::product.update',compact('product','categories'));
   }
   public function update(RequestProduct $requestProduct, $id)
   {
       $this->insertOrUpdate($requestProduct,$id);
       return redirect()->back()->with('info','Cập nhật thành công');
   }
   public function getCategories()
   {
        return Category::all();
   }

  //  public function getSuppliers()
  // 	{
	// 	return Supplier::all();
  // 	}

   public function insertOrUpdate($requestProduct, $id='')
   {
      $product = new Product();
      if($id) $product = Product::find($id);
      $product->pro_name = $requestProduct->pro_name;
      $product->pro_slug = str_slug($requestProduct->pro_name);
      $product->pro_description = $requestProduct->pro_description;
      $product->pro_content = $requestProduct->pro_content;
      $product->pro_title_seo = $requestProduct->pro_title_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_name;
      $product->pro_description_seo = $requestProduct->pro_description_seo ? $requestProduct->pro_description_seo : $requestProduct->pro_description_seo;
      $product->pro_category_id = $requestProduct->pro_category_id;
      $product->pro_price = $requestProduct->pro_price;
      $product->pro_sale = $requestProduct->pro_sale;
      $product->pro_number = $requestProduct->pro_number;
      // $product->pro_supplier_id = $requestProduct->pro_supplier_id;
      if ($requestProduct->hasFile('avatar')) 
      {
        
        $file = upload_image('avatar');
        if(isset($file['name']))
        {
          $product->pro_avatar = $file['name'];
        }
      }
      $product->save();
   }
   public function action($action,$id){
      $product = Product::find($id);
      if($action){
        switch ($action)
        {
            case 'delete':
              $product->delete(); 
              $messages = 'Xóa thành công';
              break;
            case 'active':
              $product->pro_active = $product->pro_active ? 0 : 1;
              $messages = 'Cập nhật thành công';
              $product->save(); 
            break; 
            case 'hot':
              $product->pro_hot = $product->pro_hot ? 0 : 1;
              $messages = 'Cập nhật thành công';
              $product->save(); 
            break;
        }
      }
      return redirect()->back()->with('success',$messages);
    }
   
}
