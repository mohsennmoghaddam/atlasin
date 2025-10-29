<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RealAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // بررسی اینکه کاربر وارد شده و حداقل یکی از نقش‌ها را دارد
        if (auth()->check() && auth()->user()->hasRole($roles)) {
            return $next($request);
        }

        // اگر نقش مناسب نبود، خطای 403
        abort(403, 'شما اجازه دسترسی به این بخش را ندارید.');
    }
}
