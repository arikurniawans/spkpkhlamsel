<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data untuk Penghasilan Bulanan
        $penghasilan = [
            [
                'nama_kriteria' => 'Penghasilan Bulanan',
                'tipe_kriteria' => 'cost',
                'sub_kriteria' => '< Rp 500.000',
                'bobot' => 5,
            ],
            [
                'nama_kriteria' => 'Penghasilan Bulanan',
                'tipe_kriteria' => 'cost',
                'sub_kriteria' => 'Rp 500.000 - Rp 1.000.000',
                'bobot' => 4,
            ],
            [
                'nama_kriteria' => 'Penghasilan Bulanan',
                'tipe_kriteria' => 'cost',
                'sub_kriteria' => 'Rp 1.000.000 - Rp 1.500.000',
                'bobot' => 3,
            ],
            [
                'nama_kriteria' => 'Penghasilan Bulanan',
                'tipe_kriteria' => 'cost',
                'sub_kriteria' => 'Rp 1.500.000 - Rp 2.000.000',
                'bobot' => 2,
            ],
            [
                'nama_kriteria' => 'Penghasilan Bulanan',
                'tipe_kriteria' => 'cost',
                'sub_kriteria' => '> Rp 2.000.000',
                'bobot' => 1,
            ],
        ];

        // Data untuk Jumlah Anak Usia Dini
        $jumlah_anak_dini = [
            [
                'nama_kriteria' => 'Jumlah Anak Usia Dini',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => '> 3 anak',
                'bobot' => 5,
            ],
            [
                'nama_kriteria' => 'Jumlah Anak Usia Dini',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => '2-3 anak',
                'bobot' => 4,
            ],
            [
                'nama_kriteria' => 'Jumlah Anak Usia Dini',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => '1 anak',
                'bobot' => 3,
            ],
            [
                'nama_kriteria' => 'Jumlah Anak Usia Dini',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => 'Tidak ada anak usia dini',
                'bobot' => 1,
            ],
        ];

        // Data untuk Jumlah Anak Sekolah
        $jumlah_anak_sekolah = [
            [
                'nama_kriteria' => 'Jumlah Anak Sekolah',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => '> 3 anak',
                'bobot' => 5,
            ],
            [
                'nama_kriteria' => 'Jumlah Anak Sekolah',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => '2-3 anak',
                'bobot' => 4,
            ],
            [
                'nama_kriteria' => 'Jumlah Anak Sekolah',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => '1 anak',
                'bobot' => 3,
            ],
            [
                'nama_kriteria' => 'Jumlah Anak Sekolah',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => 'Tidak ada anak sekolah',
                'bobot' => 1,
            ],
        ];

        // Data untuk Lansia dalam Keluarga
        $lansia = [
            [
                'nama_kriteria' => 'Lansia dalam Keluarga',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => 'Ada lebih dari 1 lansia',
                'bobot' => 5,
            ],
            [
                'nama_kriteria' => 'Lansia dalam Keluarga',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => 'Ada 1 lansia',
                'bobot' => 4,
            ],
            [
                'nama_kriteria' => 'Lansia dalam Keluarga',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => 'Tidak ada lansia',
                'bobot' => 1,
            ],
        ];

        // Data untuk Penyandang Disabilitas
        $disabilitas = [
            [
                'nama_kriteria' => 'Penyandang Disabilitas',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => 'Ada lebih dari 1 penyandang disabilitas',
                'bobot' => 5,
            ],
            [
                'nama_kriteria' => 'Penyandang Disabilitas',
                'tipe_kriteria' => 'benefit',
                'sub_kriteria' => 'Ada 1 penyandang disabilitas',
                'bobot' => 4,
            ],
            [
                'nama_kriteria' => 'Penyandang Disabilitas',
                'tipe_k_criteria' => 'benefit',
                'sub_kriteria' => 'Tidak ada penyandang disabilitas',
                'bobot' => 1,
            ],
        ];

        // Insert data ke dalam tabel 'kriteria'
        DB::table('kriteria')->insert(array_merge($penghasilan, $jumlah_anak_dini, $jumlah_anak_sekolah, $lansia, $disabilitas));
    }
}

