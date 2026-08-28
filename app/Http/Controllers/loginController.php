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
        // Validasi & throttle sederhana (max 5 percobaan / menit per IP+username)
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:3|max:255',
        ]);
        $throttleKey = 'login:'.strtolower($request->username).'|'.$request->ip();
        if (\Illuminate\Support\Facades\RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = \Illuminate\Support\Facades\RateLimiter::availableIn($throttleKey);
            return back()->with('message', 'Terlalu banyak percobaan. Coba lagi dalam '.$seconds.' detik.')->withInput();
        }

        try{
            $credentials = $request->only('username', 'password');
            $remember = $request->boolean('remember');
            if(Auth::attempt($credentials, $remember)) {
                \Illuminate\Support\Facades\RateLimiter::clear($throttleKey);
                $request->session()->regenerate();
                // Amankan session: regenerate ID
                $user = Auth::user();
                if(strpos($user->username, 'admin') !== false || in_array($user->status, [1,2,3])){
                    return redirect()->intended('main');
                } else {
                    $dataAirport = Airport::all();
                    $request->session()->put('dataAirport', $dataAirport);
                    $query = DB::table('users')->select('id','name')->where('id','=',$user->id)->first();
                    $request->session()->put('user_id', $query->id);
                    $request->session()->put('name', $query->name);
                    return redirect()->intended('beranda');
                }
            }
            \Illuminate\Support\Facades\RateLimiter::hit($throttleKey, 60);
            return back()->with('message', 'Username Atau Password Salah!')->withInput();
        }catch(Exception $e) {
            Log::error($e->getMessage());
            return back()->with('message', 'Kesalahan Server. Coba lagi.')->withInput();
        }
    }

    public function logout(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                Auth::guard('web')->logout();
            }
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } catch (Exception $e) {
            Log::warning('Logout error: '.$e->getMessage());
        }
        return redirect()->route('signIn')->with('message', 'Anda telah logout.');
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
