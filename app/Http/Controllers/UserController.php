<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\User;
use App\Http\Requests\RequestPassword;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //show tong quan user
    public function index()
    {
    	$transactions = Transaction::where('tr_user_id',get_data_user('web'));
    	$listTransactions = $transactions;
    	$transactions = $transactions->addSelect('id','tr_total','tr_address','tr_phone','created_at','tr_status')->paginate(10);
    	//tong don hang
    	$totalTransaction = $listTransactions->select('id')->count();
    	//don hang da xu ly
    	$totalTransactionDone = $listTransactions->where('tr_status',Transaction::STATUS_DONE)->select('id')->count();
    	
    	$viewData = [
    		'totalTransaction'	   => $totalTransaction,
    		'totalTransactionDone' => $totalTransactionDone,
    		'transactions'   	   => $transactions
    	];
    	return view('user.index',$viewData);
    }
    public function updateInfo()
    {
    	$user = User::find(get_data_user('web'));
    	return view('user.info',compact('user'));
    }
    public function saveUpdateInfo(Request $request)
    {
        $user = new User();
        $user = User::find(get_data_user('web'));
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if ($request->hasFile('avatar')) 
          {
            $file = upload_image('avatar');
            if(isset($file['name']))
            {
              $user->avatar = $file['name'];
            }
          }
          $user->save();
    	return redirect()->back()->with('success','Cập nhật thông tin thành công');
    }
    public function updatePassword()
    {
    	return view('user.password');
    }
    public function saveUpdatePassword(RequestPassword $requestPassword)
    {
    	if(Hash::check($requestPassword->password_old,get_data_user('web','password')))
    	{
    		$user = User::find(get_data_user('web'));
    		$user->password = bcrypt($requestPassword->password_new);
    		$user->save();
    		return redirect()->back()->with('success','Cập nhật thành công');
    	}
    	return redirect()->back()->with('danger','Mật khẩu củ không đúng');
    }
    public function getListProduct()
    {
    	$products = Product::orderBy('pro_pay','desc')->limit(10)->get();
    	return view('user.product',compact('products'));
    }
    public function getProductCare()
    {
    	return view('user.care_product');
    }
}
