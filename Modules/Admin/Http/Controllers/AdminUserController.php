<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
class AdminUserController extends Controller
{
 
    public function index(Request $request)
    {
    	$users = User::whereRaw(1);
    	$users = User::paginate(10);
    	$viewData = [
    		'users' => $users
    	];
        return view('admin::user.index',$viewData);
    }

    public function action($action,$id)
    {
    	$users = User::find($id);
        if($action)
        {
            switch ($action) {
                case 'delete':
                    $users->delete();
                    break;
            }
        }    
    	return redirect()->back()->with('danger','Xóa dữ liệu thành công');
    }
}
