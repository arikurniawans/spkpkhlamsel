<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Pendamping
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
        // Contoh logika middleware: cek jika user adalah pendamping
        if (!$request->user() || !$request->user()->isPendamping()) {
            return redirect('/home'); // atau halaman lain sesuai kebutuhan
        }

        return $next($request);
    }
}
