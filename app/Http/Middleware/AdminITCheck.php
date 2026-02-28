<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminITCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('admin_it_logged_in')) {
            // Nếu không có session đăng nhập, quay về trang giám sát
            return redirect()->route('dashboard.guard')->with('error', 'Bạn cần đăng nhập quyền IT Admin.');
        }

        return $next($request);
    }
}
