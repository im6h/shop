<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\User;
use App\Models\Order;
use Cart;
use Carbon\Carbon;
use Mail;
use App\Mail\ProductPlaces;
use Illuminate\Support\Facades\Input;
class ShoppingCartController extends FrontendController
{
     public function __construct()
    {
        parent::__construct();
    }
    //them gio hang
    public function addProduct(Request $request,$id)
    {
    	$product = Product::select('pro_name','id','pro_price','pro_sale','pro_avatar','pro_number')->find($id);
    	if(!$product) return redirect('/');
        $price = $product->pro_price;
        if ($product->pro_sale) {
            $price = $price*(100-$product->pro_sale)/100;
        }
        if($product->pro_number == 0)
        {
            return redirect()->back()->with('warning','Sản phẩm đã hết hàng');
        }
    	Cart::add([
    		'id' => $id,
    		'name' => $product->pro_name,
    		'qty' => 1,
    		'price' =>$price,
    		'options' => [
                'avatar' => $product->pro_avatar,
                'sale' => $product->pro_sale,
                'price_old' => $product->pro_price
            ]
    	]);
    	return redirect()->back()->with('success','Mua hàng thành công');
    }
    //danh sach gio hang
    public function getListShoppingCart(Request $requests)
    {
        
    	$products = Cart::content();
    	return view('shopping.index',compact('products'));
    }
     public function getupdatecart($id,$idrow,$qty,$dk)
    {
       $product = Product::select('pro_number')->find($id);
      if ($dk=='up' && $qty<$product->pro_number ) {
         $qt = $qty+1;
         Cart::update($idrow, $qt);
         return redirect()->back();
      } elseif ($dk=='down') {
         $qt = $qty-1;
         Cart::update($idrow, $qt);
         return redirect()->back();
      } else {
         return redirect()->back()->with('warning','Sản phẩm đã hết hàng');
      }
    }
    
    //thanh toan gio hang
    public function getFormPay()
    {
        $products = Cart::content();
        return view('shopping.pay',compact('products'));
    }
    //xoa danh sach san pham
    public function deleteProductItem($key)
    {
        Cart::remove($key);
        return redirect()->back();
    }
    //save thong tin gio hang
    public function saveInfoShoppingCart(Request $request)
    {
        $totalMoney = str_replace(',','',Cart::subtotal(0,3));
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),//mac dinh lay id
            'tr_total' => $totalMoney,
            'tr_note' => $request->note,
            'tr_address' =>$request->address,
            'tr_phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if ($transactionId) 
        {
           $products = Cart::content();
           foreach ($products as $product) 
           {
                Order::insert([
              'or_transaction_id' => $transactionId,
              'or_product_id' => $product->id,
              'or_qty' => $product->qty,
              'or_price' =>$product->options->price_old,
              'or_sale' =>$product->options->sale 
          ]);
           }
        }

         //gui thong tin gio hang qua mail
        $data = [
           'address' => $request->address
        ];
        $email = $request->email;
        $checkUser = User::where('email',$email)->first();
        Mail::to($email)->send(new ProductPlaces($products,$data));

         //xoa gio hang sau khi dat hang thanh cong
        Cart::destroy();
        
       
       // $url = route('get.link.reset.password',['code'=> $checkUser->code,'email'=>$email]);
     
        return redirect()->back()->with('alert', 'Mua hàng công, cảm ơn bạn đã mua hàng ở website chúng tôi,vui lòng kiểm tra email của bạn để biết chi tiết đơn hàng!');;
    }
}
