<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Contact;
class AdminContactController extends Controller
{
  

    public function index(Request $request)
    {
        // $contacts = Contact::all();
        $contacts = Contact::paginate(10);
        $dataView = [
            'contacts' => $contacts
        ];
        return view('admin::contact.index',$dataView);
    }
    public function action($action,$id){
      $contact = Contact::find($id);
      if($action){
        switch ($action)
        {
          case 'delete':
            $contact->delete();
            break;

            case 'active':
            $contact->c_status = $contact->c_status ? 0 : 1;
            break;
            
            $contact->save();
        }
        $contact->save(); 
      }
      return redirect()->back();
    }
}
