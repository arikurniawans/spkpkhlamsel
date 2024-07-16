<?php

namespace App\Models; // Sesuaikan dengan namespace yang sesuai dengan struktur aplikasi Anda

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria'; // Nama tabel yang terkait dengan model

    protected $primaryKey = 'id_kriteria'; // Nama primary key

    protected $fillable = [
        'nama_kriteria',
        'tipe_kriteria',
        'sub_kriteria',
        'bobot',
    ];

    // Jika Anda ingin mengabaikan kolom created_at dan updated_at
    // public $timestamps = false;

    // Jika Anda ingin mengubah format datetime yang digunakan Laravel
    // protected $dateFormat = 'Y-m-d H:i:s.u';

    // Jika Anda ingin menambahkan relasi dengan model lain
    // public function relatedModel()
    // {
    //     return $this->hasOne(RelatedModel::class);
    // }

    // Atau bisa juga dengan relasi hasMany, belongsTo, dll, sesuai kebutuhan aplikasi

}
