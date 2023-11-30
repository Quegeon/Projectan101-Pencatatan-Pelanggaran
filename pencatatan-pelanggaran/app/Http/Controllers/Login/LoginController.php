<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{  
    public function postlogin_user(Request $request)
    {
        if(Auth::attempt($request->only('username','password'))){
            return redirect()->route('dashboard.petugas');
        }else{
            return back()->with('error', 'Maaf Username dan Password yang Anda Masukan salah!');
        }
    }

    public function postlogin_bk(Request $request)
    {
        if(Auth::guard('bk')->Attempt($request->only('username','password'))){
            return redirect()->route('dashboard.bk');
        }else{
            return back()->with('error', 'Maaf Username dan Password yang Anda Masukan salah!');
        }
    }
    
    public function logout_user() {
        Auth::logout();
        return redirect()->route('login.user');
    }
  
    public function logout_bk() {
        Auth::logout();
        return redirect()->route('login.bk');
    }
}
