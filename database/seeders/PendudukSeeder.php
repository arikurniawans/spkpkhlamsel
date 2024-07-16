<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penduduk;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penduduk::create([
            'nik' => '1234567890123456',
            'nama_penduduk' => 'Ahmad Sudirman',
            'jenis_kelamin' => 'L',
            'dusun' => 'Dusun 1',
        ]);

        Penduduk::create([
            'nik' => '2345678901234567',
            'nama_penduduk' => 'Siti Aminah',
            'jenis_kelamin' => 'P',
            'dusun' => 'Dusun 2',
        ]);

        Penduduk::create([
            'nik' => '3456789012345678',
            'nama_penduduk' => 'Budi Santoso',
            'jenis_kelamin' => 'L',
            'dusun' => 'Dusun 3',
        ]);

        Penduduk::create([
            'nik' => '4567890123456789',
            'nama_penduduk' => 'Dewi Sartika',
            'jenis_kelamin' => 'P',
            'dusun' => 'Dusun 4',
        ]);
    }
}
