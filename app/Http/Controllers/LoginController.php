<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (session()->has('user')){
            return back();
        }
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $userData = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($userData)) {
            \session()->push('user', $userData);
            return redirect()->route('admins.index')->withInput();
        }
        return redirect()->route('login')->withErrors(['email'=>'Information not correct']);

    }

    public function logout()
    {
        Auth::logout();
        \session()->forget('user');
        return redirect()->route('login');
    }
}
