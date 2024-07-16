<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatif';

    protected $primaryKey = 'id_alternatif'; // Menentukan bahwa primary key adalah id_alternatif

    protected $fillable = [
        'id_penduduk',
        'id_kriteria',
        // tambahkan kolom-kolom lain yang perlu di-fillable
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'id_penduduk', 'id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }
}
