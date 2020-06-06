<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestSupplier;
use App\Models\Supplier;
class AdminSupplerController extends Controller
{
   //show danh sách nhà cung cấp
    public function index()
    {
        $suppliers = Supplier::whereraw(1)->paginate(10);
        return view('admin::supplier.index',compact('suppliers'));
    }

    //thêm mới nhà cung cấp

    public function create(){
		
    	return view('admin::supplier.create',compact('suppliers'));
    }

    public function store(RequestSupplier $requestSupplier){

    	$this->insertOrUpdate($requestSupplier);
    	return redirect()->back()->with('success','Thêm mới thành công'); 
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin::supplier.update',compact('supplier'));
    }

    public function update(RequestSupplier $requestSupplier, $id)
    {
        $this->insertOrUpdate($requestSupplier,$id);
    	return redirect()->back()->with('info','Cập nhật thành công'); 
	}
	
    public function insertOrUpdate($requestSupplier,$id=''){
    	$code = 1;
    	try{
    		
    	$supplier = new Supplier();
    	if($id){
    		$supplier = Supplier::find($id);
    	}
    	$supplier->s_name = $requestSupplier->s_name;
    	$supplier->s_email = $requestSupplier->s_email;
    	$supplier->s_phone = $requestSupplier->s_phone;
    	$supplier->s_address = $requestSupplier->s_address;
    	$supplier->save();
    	}catch(Exception $exception)
    	{
    		$code = 0;
    		Log::error("[Error insertOrUpdate Categories]".$exception->getMessage());//bat loi $exception->getMessage() nem ra thong tin loi qua ham getMessage()
    	}
    	return $code;
    }

    public function action($action,$id){
    	$supplier = Supplier::find($id);
    	if($action){
    		switch ($action)
    		{
    			case 'delete':
    				$supplier->delete();
                    $messages = 'Xóa dữ liệu thành công';
    				break;      
    		}
    	}
    	return redirect()->back()->with('danger',$messages);
    }
}
