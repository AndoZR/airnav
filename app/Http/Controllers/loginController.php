<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\airport;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function signIn(Request $request)
    {
        try{
            if(strpos($request->username, 'admin') !== false){
                if(Auth::attempt($request->only('username', 'password'))) {
                    session()->regenerate(destroy:true);
                    return redirect('main');
                }
            } else {
                if(Auth::attempt($request->only('username', 'password'))) {
                    session()->regenerate(destroy:true);    
                    $dataAirport = Airport::all(); // atau gunakan query lain sesuai kebutuhan
                    // Menyimpan data ke dalam session
                    $request->session()->put('dataAirport', $dataAirport);
                    $query = DB::table('users')->select('id','name')->where('username','=',$request->input('username'))->first();
                   
                    $request->session()->put('user_id', $query->id);
                    $request->session()->put('name', $query->name);
                    return redirect('beranda');
                }
            }
            return redirect('/')->with('message', 'Username Atau Password Salah!');
        }catch(Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Kesalahan Server", 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
    
    public function auth(Request $request)
    {
        if(in_array($request->user()->status,[1,2,3])){
            return redirect('main');
        }
        if(in_array($request->user()->status,[4])){
            return redirect('beranda');
        }
    }
}
