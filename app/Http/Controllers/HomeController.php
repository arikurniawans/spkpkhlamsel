<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Arahkan pengguna ke dashboard sesuai role
        $role = auth()->user()->role;

        if ($role === 'pendamping') {
            // return redirect()->route('dashboard.pendamping');
            return redirect()->route('penduduk');
        } elseif ($role === 'penduduk') {
            return redirect()->route('dashboard.penduduk');
        } else {
            return view('home');
        }
    }

    public function pendamping()
    {
        return view('penduduk');
    }

    public function penduduk()
    {
        return view('dashboard.penduduk');
    }
}
