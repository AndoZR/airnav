<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class cekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$status): Response
    {
        // Belum login → wajib login dulu, tidak bisa lihat home/artikel dll
        if (!$request->user()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['message' => 'Unauthenticated. Silakan login.'], 401);
            }
            return redirect()->route('signIn')->with('message', 'Silakan login terlebih dahulu untuk mengakses halaman.');
        }
        if(in_array($request->user()->status,$status)){
            // Anti-cache agar tidak bisa back setelah logout
            $response = $next($request);
            return $response->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                            ->header('Pragma','no-cache')
                            ->header('Expires','Sat, 01 Jan 2000 00:00:00 GMT');
        }
        // Sudah login tapi status tidak sesuai → kembalikan ke dashboard sesuai role
        if(in_array($request->user()->status,[1,2,3])){
            return redirect()->route('dashboard')->with('message','Akses ditolak untuk role Anda.');
        }
        if($request->user()->status==4){
            return redirect()->route('beranda.index')->with('message','Akses ditolak untuk role Anda.');
        }
        return redirect()->route('signIn')->with('message', 'Anda tidak memiliki akses!');
    }
}
