<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Penduduk
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Contoh logika middleware: cek jika user adalah penduduk
        if (!$request->user() || !$request->user()->isPenduduk()) {
            return redirect('/home'); // atau halaman lain sesuai kebutuhan
        }

        return $next($request);
    }
}
