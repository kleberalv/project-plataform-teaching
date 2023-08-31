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
            // Autenticação bem-sucedida
            return redirect()->intended('/admin');
        } else {
            // Autenticação falhou
            return back()->withErrors(['email' => 'Credenciais inválidas.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
