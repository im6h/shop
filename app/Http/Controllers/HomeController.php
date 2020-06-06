<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Article;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Order;
class HomeController extends FrontendController
{
	public function __construct()
	{
		parent::__construct();
	}
    public function index()
    {
    	$productHots = Product::where([
    		'pro_hot' => Product::HOT_ON,
    		'pro_active' => Product::STATUS_PUBLIC
    	])->limit(5)->get();
        $articleNews = Article::where('a_hot',Article::HOT)->limit(3)->get();

        $categoriesHome = Category::with('products')->where('c_home',Category::HOME)->limit(3)->get();
        //kiem tra nguoi dung dang nhap
        $productSuggest = [];
        if (get_data_user('web')) {
            $transactions = Transaction::where([
                'tr_user_id' => get_data_user('web'),
                'tr_status'  => Transaction::STATUS_DONE
            ])->pluck('id');
            // lay list id cua don hang
            if (!empty($transactions)) {
                $listID = Order::whereIn('or_transaction_id',$transactions)->distinct()->pluck('or_product_id');
                //lay list id cua san pham
                if (!empty($listID)) {
                    $listIdCategory = Product::whereIn('id',$listID)->distinct()->pluck('pro_category_id');
                    //lay list id cua danh muc
                    if ($listIdCategory) {
                        $productSuggest = Product::whereIn('pro_category_id',$listIdCategory)->limit(8)->get();
                    }
                }
            }
        }
        //chua dang nhap thi khong suggest

    	$viewData = [
    		'productHots'    => $productHots,
            'articleNews'    => $articleNews,
            'categoriesHome' => $categoriesHome,
            'productSuggest' => $productSuggest
    	];
        return view('home.index',$viewData);
    }

    public function renderProductView(Request $request)
    {
        if ($request->ajax()) {
            $listID = $request->id;
            $products = Product::whereIn('id',$listID)->limit(4)->orderBy('id','desc')->get();
            //Phương thức whereIn kiểm tra giá trị của cột nằm trong một mảng id listID
            $html = view('components.product_view',compact('products'))->render();
            //render() returns the string contents of the view. It is also used inside the class' __toString() method which allows you to echo a View object.
            return response()->json(['data' => $html ]);
        }
    }
}
