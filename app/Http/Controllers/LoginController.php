<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect()->route('home');
        } else {
            Session::flash('error', 'Maaf, Email atau Password Salah');
            return redirect('/login');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        return redirect('login');
    }
}
