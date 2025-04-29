<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Mengecek apakah user yang login adalah admin
        if (Auth::check() && Auth::user()->is_admin) {  // pastikan ada kolom `is_admin` di tabel users
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman utama atau halaman login
        return redirect('/');  // atau bisa menggunakan redirect()->route('login');
    }
}
