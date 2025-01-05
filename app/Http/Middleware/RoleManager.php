<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Middleware untuk memeriksa peran user.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Chain of Responsibility: Validasi autentikasi user
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $authUserRole = Auth::user()->role;

        // Chain of Responsibility: Periksa role berdasarkan parameter
        switch ($role) {
            case 'admin':
                if ($authUserRole == 0) {
                    return $next($request);
                }
                break;
            case 'customer':
                if ($authUserRole == 1) {
                    return $next($request);
                }
                break;
        }

        // Redirect ke halaman sesuai peran user
        switch ($authUserRole) {
            case 0:
                return redirect()->route('admin');
            case 1:
                return redirect()->route('customer');
        }

        return redirect()->route('login');
    }
}
