<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    function showLogin(){
        if (!Auth::user()){
            return view('admin.login.login');
        }else{
            return redirect()->route('admin.book.index');
        }
    }

    function checkLogin(Request $request): \Illuminate\Http\RedirectResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication was successful...
            return redirect()->route('book.list');
        }else{
            Session::flash('error','Email or password not correct !!');
            return back();
        }
    }

    function logout(){
        Auth::logout();
        return view('admin.login.login');
    }
}
