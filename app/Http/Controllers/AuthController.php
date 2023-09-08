<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('formlogin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin');
        } else {
            return back()->with('error', 'Usuário ou senha incorretos');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
