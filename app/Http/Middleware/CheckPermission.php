<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = Auth::user();

        if (!$user) {
            abort(403, 'شما وارد نشده‌اید.');
        }

        // بررسی اینکه آیا کاربر از طریق نقش خود این پرمیشن را دارد
        if (!$user->hasPermissionTo($permission)) {
            abort(403, 'شما اجازه دسترسی به این بخش را ندارید.');
        }

        return $next($request);
    }
}
