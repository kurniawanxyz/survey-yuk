<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekRolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
         // Periksa apakah pengguna telah melakukan autentikasi
    if (!Auth::check()) {
        return redirect()->route('page.login');
    }

    // Periksa peran pengguna
    $user = Auth::user();
    if ($user->role_id == $roles) {
        abort(403, 'Unauthorized');
    }

    return $next($request);
    }
}
