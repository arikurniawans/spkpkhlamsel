<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index(Request $request)
    {
        // Data yang ingin dikirimkan ke view
        $data = [
            'title' => 'Data Kriteria',
            'data_c1' => Kriteria::where('nama_kriteria', 'Penghasilan Bulanan')->get(),
            'data_c2' => Kriteria::where('nama_kriteria', 'Jumlah Anak Usia Dini')->get(),
            'data_c3' => Kriteria::where('nama_kriteria', 'Jumlah Anak Sekolah')->get(),
            'data_c4' => Kriteria::where('nama_kriteria', 'Lansia dalam Keluarga')->get(),
            'data_c5' => Kriteria::where('nama_kriteria', 'Penyandang Disabilitas')->get(),
        ];

        // Panggil view 'kriteria.index' dan kirimkan data
        return view('kriteria.index', $data);
    }
}
