<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

    use AuthenticatesUsers;
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        return redirect()->back()->with('alert','Bạn đã nhập sai email hoặc password! Xin mời nhập lại');
    }
    public function postLogout() 
    {
      Auth::logout();
      return redirect()->route('home');
    }
}
