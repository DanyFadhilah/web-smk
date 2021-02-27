<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;

    protected $table = 'siswa';

    protected $fillable = [
        'user_id',
        'nis',
        'nisn',
        'nama',
        'alamat_1',
        'alamat_2',
        'provinsi',
        'kabkota',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status_dalam_keluarga',
        'anak_ke',
        'diterima_dikelas',
        'pada_tanggal',
        'profile',
        'nama_ayah',
        'nama_ibu',
        'alamat_ortu',
        'nohp_rumah',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'nama_wali',
        'alamat_wali',
        'nohp_wali',
        'pekerjaan_wali'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
