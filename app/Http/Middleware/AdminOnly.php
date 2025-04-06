<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu user đã đăng nhập và có role là admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        
        // Nếu không phải admin thì chuyển hướng với thông báo lỗi
        return redirect()->route('welcome')
            ->with('error', 'Bạn không có quyền truy cập chức năng này!');
    }
}
