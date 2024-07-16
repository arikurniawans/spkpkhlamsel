<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Penduduk;
use App\Models\Alternatif;

class RekomendasiController extends Controller
{

    public function index(Request $request)
    {
        $kriteriaNames = [
            'Penghasilan Bulanan',
            'Jumlah Anak Usia Dini',
            'Jumlah Anak Sekolah',
            'Lansia dalam Keluarga',
            'Penyandang Disabilitas'
        ];

        $data = [
            'title' => 'Data Rekomendasi Penerima Bansos PKH',
            'formtitle1' => 'Data Alternatif',
            'formtitle2' => 'Data Awal (Nilai Bobot)',
            'formtitle3' => 'Data Normalisasi',
            'formtitle4' => 'Hasil Metode Simple Addictive Weighting (SAW)'
        ];

        // Mengambil data kriteria
        // foreach ($kriteriaNames as $index => $kriteriaName) {
        //     $key = 'data_c' . ($index + 1);
        //     $data[$key] = Kriteria::where('nama_kriteria', $kriteriaName)->get();
        // }

        // Mengambil data penduduk dan alternatif
        $data['data_penduduk'] = Penduduk::orderBy('nik')->get();
        $data['data_alternatif'] = Alternatif::orderBy('id_alternatif')
            ->leftJoin('penduduks', 'alternatif.id_penduduk', '=', 'penduduks.id')
            ->leftJoin('kriteria as c1', function($join) {
                $join->on('alternatif.id_kriteria_c1', '=', 'c1.id_kriteria')
                    ->where('c1.nama_kriteria', '=', 'Penghasilan Bulanan');
            })
            ->leftJoin('kriteria as c2', function($join) {
                $join->on('alternatif.id_kriteria_c2', '=', 'c2.id_kriteria')
                    ->where('c2.nama_kriteria', '=', 'Jumlah Anak Usia Dini');
            })
            ->leftJoin('kriteria as c3', function($join) {
                $join->on('alternatif.id_kriteria_c3', '=', 'c3.id_kriteria')
                    ->where('c3.nama_kriteria', '=', 'Jumlah Anak Sekolah');
            })
            ->leftJoin('kriteria as c4', function($join) {
                $join->on('alternatif.id_kriteria_c4', '=', 'c4.id_kriteria')
                    ->where('c4.nama_kriteria', '=', 'Lansia dalam Keluarga');
            })
            ->leftJoin('kriteria as c5', function($join) {
                $join->on('alternatif.id_kriteria_c5', '=', 'c5.id_kriteria')
                    ->where('c5.nama_kriteria', '=', 'Penyandang Disabilitas');
            })
            ->select(
                'alternatif.id_alternatif',
                'penduduks.id',
                'penduduks.nik',
                'penduduks.nama_penduduk',
                'c1.id_kriteria as c1_id',
                'c2.id_kriteria as c2_id',
                'c3.id_kriteria as c3_id',
                'c4.id_kriteria as c4_id',
                'c5.id_kriteria as c5_id',
                'c1.sub_kriteria as c1_nama',
                'c1.bobot as c1_bobot',
                'c2.sub_kriteria as c2_nama',
                'c2.bobot as c2_bobot',
                'c3.sub_kriteria as c3_nama',
                'c3.bobot as c3_bobot',
                'c4.sub_kriteria as c4_nama',
                'c4.bobot as c4_bobot',
                'c5.sub_kriteria as c5_nama',
                'c5.bobot as c5_bobot'
            )
            ->get();

        // Menghitung nilai max dan min bobot
        $max_min_values = [
            'c1_bobot_min' => $data['data_alternatif']->min('c1_bobot'),
            'c2_bobot_max' => $data['data_alternatif']->max('c2_bobot'),
            'c3_bobot_max' => $data['data_alternatif']->max('c3_bobot'),
            'c4_bobot_max' => $data['data_alternatif']->max('c4_bobot'),
            'c5_bobot_max' => $data['data_alternatif']->max('c5_bobot')
        ];

        // Menambahkan nilai max dan min bobot ke data
        $data = array_merge($data, $max_min_values);

        // Menghitung total bobot dari semua kriteria
        $totalBobot = 0;
        $bobots = [];
        // Hitung total bobot terlebih dahulu
        foreach ($kriteriaNames as $kriteriaName) {
            $bobot = Kriteria::where('nama_kriteria', $kriteriaName)->pluck('bobot')->sum();
            $totalBobot += $bobot;
        }

        $bobot1 = 0;
        $bobot2 = 0;
        $bobot3 = 0;
        $bobot4 = 0;
        $bobot5 = 0;

        // Hitung total bobot dari semua kriteria
        foreach ($kriteriaNames as $index => $kriteriaName) {
            $bobot = Kriteria::where('nama_kriteria', $kriteriaName)->pluck('bobot')->sum();
            // Simpan bobot ke variabel yang sesuai
            switch ($index) {
                case 0:
                    $bobot1 = $bobot;
                    break;
                case 1:
                    $bobot2 = $bobot;
                    break;
                case 2:
                    $bobot3 = $bobot;
                    break;
                case 3:
                    $bobot4 = $bobot;
                    break;
                case 4:
                    $bobot5 = $bobot;
                    break;
                default:
                    break;
            }
        }

        // Hitung bobot setiap kriteria
        $bobot1 /= $totalBobot;
        $bobot2 /= $totalBobot;
        $bobot3 /= $totalBobot;
        $bobot4 /= $totalBobot;
        $bobot5 /= $totalBobot;

        // Siapkan data untuk dikirimkan ke view
        $data['normalisasi_bobots'] = [
            'bobot1' => $bobot1,
            'bobot2' => $bobot2,
            'bobot3' => $bobot3,
            'bobot4' => $bobot4,
            'bobot5' => $bobot5,
        ];

        $data['total_bobot'] = $totalBobot;

        // Panggil view 'rekomendasi.index' dan kirimkan data
        return view('rekomendasi.index', $data);
    }
}
