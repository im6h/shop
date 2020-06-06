<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
   
    public function getRegister()
    {
        return view('auth.register');
    }
   public function postRegister(Request $request)
   {
       $users = User::select('email')->get();
      foreach ($users as $userss) {
        if($userss->email == $request->email)
        {
          return redirect()->route('get.register')->with('danger','Email của bạn đã được đăng ký');
        }
      }
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->password = bcrypt($request->password);
       $user->save();
      
       
       if($user->id)
       {
       	return redirect()->route('get.login')->with('success','Đăng ký thành công');
       }

   }
}
