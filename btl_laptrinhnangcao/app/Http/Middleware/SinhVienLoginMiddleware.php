<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SinhVienLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $user=Auth::user();
            $quyen =$user->quyen;
            if($quyen==4) {
                return $next($request);//cho truy cap vao admin
            }
            else return redirect('dangnhap');
        }
        else return redirect('dangnhap');
    }
}
