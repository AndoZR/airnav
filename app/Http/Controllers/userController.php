<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function index() {
        return view('login');
    }

    public function signIn(Request $request) {
         $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255|min:8'
         ]);

         if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
         }

         // jika berhasil valid
         if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/admin')->with('success', 'Berhasil Login!');
         }
         
         return back()->with('error', 'Username atau Password Salah!');
    }
}
