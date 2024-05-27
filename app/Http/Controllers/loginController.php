<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function signIn(Request $request) {
        if(strpos($request->username, 'admin') !== false){
            if(Auth::attempt($request->only('username', 'password'))) {
                session()->regenerate(destroy:true);
                
                // return redirect('main');
            }
        } else {
            if(Auth::attempt($request->only('username', 'password'))) {
                var_dump($request->user());
                session()->regenerate(destroy:true);
                
                // return redirect('beranda');
            }
        }
        return redirect('/')->with('message', 'Username Atau Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
