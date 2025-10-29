<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Acl
{
    /**
     * استفاده روی روت:
     *  acl:view-dashboard
     *  acl:read-blog,update-blog                 // AND
     *  acl:read-blog|create-blog                 // OR
     *  acl:read-blog|create-blog,delete-blog     // (read OR create) AND delete
     */
    public function handle(Request $request, Closure $next, ...$groups)
    {
        $user = $request->user();
        if (!$user) {
            return $this->deny($request, 401, 'شما وارد نشده‌اید.');
        }

        // بای‌پس برای Real-Admin
        if (method_exists($user, 'hasRole') && $user->hasRole('Real-Admin')) {
            return $next($request);
        }

        // هر آرگومان بعد از ":" در روت (با کاما جدا شده) = یک گروه AND
        foreach ($groups as $group) {
            // داخل هر گروه اگر با | جدا شود = OR
            $alternatives = array_map('trim', explode('|', $group));
            $passed = false;

            foreach ($alternatives as $perm) {
                $ok = false;

                // سیستم دستی
                if (method_exists($user, 'hasPermission')) {
                    $ok = $user->hasPermission($perm);
                }
                // سازگاری با Spatie (اگر جایی ازش استفاده شده باشد)
                elseif (method_exists($user, 'hasPermissionTo')) {
                    $ok = $user->hasPermissionTo($perm);
                }

                if ($ok) { $passed = true; break; }
            }

            if (!$passed) {
                return $this->deny($request, 403, 'شما اجازه دسترسی به این بخش را ندارید.');
            }
        }

        return $next($request);
    }

    protected function deny(Request $request, int $code, string $message)
    {
        return $request->expectsJson()
            ? response()->json(['message' => $message], $code)
            : abort($code, $message);
    }
}
