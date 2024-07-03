<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->roles !='admin'){
                return redirect()->route('admin.getlogin')->with(['message'=>'Tài khoản không có quyền truy cập','color'=>'warning']);
            }
        }else{
            return redirect()->route('admin.getlogin');
        }
        return $next($request);
    }
}
