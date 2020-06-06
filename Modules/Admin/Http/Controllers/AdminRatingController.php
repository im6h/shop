<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Rating;
class AdminRatingController extends Controller
{


    public function index()
    {
        $ratings = Rating::with('user:id,name','product:id,pro_name')->paginate(10);
        $dataView = 
        [
            'ratings' => $ratings
        ];
        return view('admin::rating.index',$dataView);
    }

 	public function action($action,$id)
 	{
 		$ratings = Rating::find($id);
 		if ($action) {
 			 switch ($action) {
 			 	case 'delete':
 			 		$ratings->delete();
 			 		break;
 			 }
 		}
 		return redirect()->back()->with('danger','Xóa dữ liệu thành công');
 	}
}
