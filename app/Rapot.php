<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rapot extends Model
{
    use SoftDeletes;

    protected $table = 'rapot';

    protected $fillable = [
        'nis',
        'siswa',
        'kelas',
        'akademik',
        'integritas', 
        'religius',
        'nasionalis',
        'mandiri',
        'gotong_royong',
        'catatan',
        'mitra_pkl',
        'lokasi',
        'lama_pkl',
        'keterangan',
    ];
}
