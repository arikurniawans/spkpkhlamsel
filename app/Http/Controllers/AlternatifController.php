<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\kriteria;
use App\Models\Penduduk;


class AlternatifController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nik' => 'required|exists:penduduks,id',
            'c1' => 'required|exists:kriteria,id_kriteria',
            'c2' => 'required|exists:kriteria,id_kriteria',
            'c3' => 'required|exists:kriteria,id_kriteria',
            'c4' => 'required|exists:kriteria,id_kriteria',
            'c5' => 'required|exists:kriteria,id_kriteria',
        ]);

        $existingAlternatif = Alternatif::where('id_penduduk', $request->nik)->first();
        if ($existingAlternatif) {
            return redirect()->back()->with('error', 'NIK Penduduk sudah ada di dalam data Alternatif.');
        }

        // Simpan data ke dalam tabel alternatif
        $alternatif = new Alternatif();
        $alternatif->id_penduduk = $request->nik;
        $alternatif->id_kriteria_c1 = $request->c1;
        $alternatif->id_kriteria_c2 = $request->c2;
        $alternatif->id_kriteria_c3 = $request->c3;
        $alternatif->id_kriteria_c4 = $request->c4;
        $alternatif->id_kriteria_c5 = $request->c5;
        $alternatif->save();

        // Redirect atau response sesuai kebutuhan aplikasi Anda
        return redirect()->back()->with('success', 'Data alternatif berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nik' => 'required|exists:penduduks,id',
            'c1' => 'required|exists:kriteria,id_kriteria',
            'c2' => 'required|exists:kriteria,id_kriteria',
            'c3' => 'required|exists:kriteria,id_kriteria',
            'c4' => 'required|exists:kriteria,id_kriteria',
            'c5' => 'required|exists:kriteria,id_kriteria',
        ]);

        // Ambil data alternatif yang akan diupdate
        $alternatif = Alternatif::findOrFail($id);

        // Update nilai-nilai dari request ke dalam model
        $alternatif->id_penduduk = $request->nik;
        $alternatif->id_kriteria_c1 = $request->c1;
        $alternatif->id_kriteria_c2 = $request->c2;
        $alternatif->id_kriteria_c3 = $request->c3;
        $alternatif->id_kriteria_c4 = $request->c4;
        $alternatif->id_kriteria_c5 = $request->c5;

        // Simpan perubahan ke dalam basis data
        $alternatif->save();

        // Redirect atau response sesuai kebutuhan aplikasi Anda
        return redirect()->back()->with('success', 'Data alternatif berhasil diubah.');
    }

    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        if (!$alternatif) {
            return redirect()->back()->with('error', 'Data alternatif tidak ditemukan');
        }
        $alternatif->delete();
        return redirect()->back()->with('success', 'Data alternatif berhasil dihapus.');
    }

    public function index(Request $request)
    {
        // Data yang ingin dikirimkan ke view
        $data = [
            'title' => 'Data Alternatif',
            'data_c1' => Kriteria::where('nama_kriteria', 'Penghasilan Bulanan')->get(),
            'data_c2' => Kriteria::where('nama_kriteria', 'Jumlah Anak Usia Dini')->get(),
            'data_c3' => Kriteria::where('nama_kriteria', 'Jumlah Anak Sekolah')->get(),
            'data_c4' => Kriteria::where('nama_kriteria', 'Lansia dalam Keluarga')->get(),
            'data_c5' => Kriteria::where('nama_kriteria', 'Penyandang Disabilitas')->get(),
            'data_penduduk' => Penduduk::orderBy('nik')->get(),
            'data_alternatif' => Alternatif::orderBy('id_alternatif')
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
                                ->get(),
        ];

        // Panggil view 'alternatif.index' dan kirimkan data
        return view('alternatif.index', $data);
        // return response()->json([
        //     'ALTERNATIF' => $max_min_values,
        // ]);

    }
}
