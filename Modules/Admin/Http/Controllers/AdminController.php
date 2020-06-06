<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Rating;
use App\Models\Contact;
use App\Models\Transaction;
use App\User;
use App\Models\Product;
use App\Models\Article;
class AdminController extends Controller
{
   

    public function index()
    {
        $ratings = Rating::with('user:id,name','product:id,pro_name')->limit(10)->get();
        $contacts = Contact::limit(10)->get();

        //doanh thu ngay

        $moneyDay = Transaction::whereDay('updated_at',date('d'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');


         //doanh thu thang

         $moneyMonth = Transaction::whereMonth('updated_at',date('m'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');

         $transactionNews = Transaction::with('user:id,name')->limit(5)->orderBy('id',"DESC")->get();

         //so luong user

         $users = User::where('active',1)->count();

         //so luong san pham
         $products = Product::where('pro_number','>',0)->sum('pro_number');

         //so luong bai viet

         $articles = Article::count();

         //so luong dah gia

         $rating = Rating::count();

        $viewData = [
            'ratings'           =>$ratings,
            'contacts'          => $contacts,
            'moneyDay'          => $moneyDay,
            'moneyMonth'        => $moneyMonth,
            'transactionNews'   => $transactionNews,
            'users'             => $users,
            'products'          => $products,
            'articles'          => $articles,
            'rating'            => $rating
        ];
        return view('admin::index',$viewData);
    }

   
}
