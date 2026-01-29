<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SiswaAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('siswa_login')) {
            return redirect()->route('login.siswa');
        }

        return $next($request);
    }
}
