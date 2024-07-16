<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class PendudukController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nik' => 'required|string|max:255|unique:penduduks',
            'nama_penduduk' => 'required|string|max:150',
            'jenis_kelamin' => 'required|in:L,P',
            'dusun' => 'required|string|max:255',
        ]);

        // Simpan data ke dalam database
        $penduduk = new Penduduk();
        $penduduk->nik = $request->nik;
        $penduduk->nama_penduduk = $request->nama_penduduk;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->dusun = $request->dusun;
        $penduduk->save();

        // Redirect atau response jika berhasil disimpan
        return redirect()->back()->with('success', 'Data penduduk berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'nama_penduduk' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'dusun' => 'required',
        ]);

        // Find the Penduduk model instance
        $penduduk = Penduduk::findOrFail($id);

        // Update the attributes
        $penduduk->nama_penduduk = $request->nama_penduduk;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->dusun = $request->dusun;

        // Save the changes
        $penduduk->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Data penduduk berhasil diubah.');
    }

    public function destroy($id)
    {
        // Find the penduduk record
        $penduduk = Penduduk::findOrFail($id);

        // Delete the penduduk record
        $penduduk->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Data penduduk berhasil dihapus.');
    }

    public function index(Request $request)
    {
        // Data yang ingin dikirimkan ke view
        $data = [
            'title' => 'Data Penduduk',
            'data_penduduk' => Penduduk::orderBy('nik')->get(),
        ];

        // Panggil view 'penduduk.index' dan kirimkan data
        return view('penduduk.index', $data);
    }

}
