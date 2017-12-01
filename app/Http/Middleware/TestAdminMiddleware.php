<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TestAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role == 1)   //Kiểm tra đăng nhập quản trị viên : role = 1
        {
            return $next($request);
        }
        else
        {
            return redirect('login_form')->with('login_request','Bạn không phải là quản trị viên. Nên không thể sử dụng chức năng này');
        }
    }
}
