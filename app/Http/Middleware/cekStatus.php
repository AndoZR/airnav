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
        if($request->user() && in_array($request->user()->status,$status)){
            return $next($request);
        }
        elseif($request->user() && !(in_array($request->user()->status,$status)))
        {
            return back();
        }
        // return redirect('/')->with('message', 'Anda tidak memiliki akses!');
    }
}
