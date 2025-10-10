<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Kalau belum login → arahkan ke login
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userRole = Auth::user()->role;

        // 🔥 Jika user adalah admin, izinkan semuanya
        if ($userRole === 'admin') {
            return $next($request);
        }

        // 🔥 Jika bukan admin, pastikan dia termasuk dalam daftar role yang diizinkan
        if (!in_array($userRole, $roles)) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}
