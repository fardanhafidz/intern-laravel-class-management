<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('register');
        }
    }

    public function actionRegister(Request $request)
    {
        // $request->validate([]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login');
    }
}
