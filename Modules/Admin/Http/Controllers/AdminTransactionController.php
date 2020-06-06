<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;
class AdminTransactionController extends Controller
{

    public function index()
    {
    	$transactions = Transaction::with('user:id,name')->paginate(10);
    	$dataView = [
    		'transactions' => $transactions
    	];
        return view('admin::transaction.index',$dataView);
    }
    public function viewOrder(Request $request, $id)
    {
    	if($request->ajax())
    	{
    		$orders = Order::with('product')->where('or_transaction_id',$id)->get();
    		$html = view('admin::components.order',compact('orders'))->render();

    		return \response()->json($html);
    	}
    }
    
    public function action($action,$id){
      $transaction = Transaction::find($id);
      if($action){
        switch ($action)
        {
            case 'delete':
                $transaction->delete();
                $messages = 'Xóa thành công'; 
                break;
          
            case 'active':
                $transaction->tr_status = $transaction->tr_status ? 0 : 1;
                $messages = 'Cập nhật thành công';
                $transaction->save(); 
                break;
        }
      }
      return redirect()->back()->with('success',$messages);
    }
    public function actionTransaction($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('or_transaction_id',$id)->get();
        if ($orders) {
            //tru di so luong cua san  pham
            // tang bien pay cua san pham
          
            foreach ($orders as  $order) {
                $product = Product::find($order->or_product_id);
                $product->pro_number = $product->pro_number - $order->or_qty;
                $product->pro_pay ++;
                $product->save();
            }
        }
        //update user
        \DB::table('users')->where('id',$transaction->tr_user_id)->increment('total_pay');
        $transaction->tr_status = Transaction::STATUS_DONE;
        $transaction->save();
        return redirect()->back()->with('success','Xử lý đơn hàng thành công');
    }
}
