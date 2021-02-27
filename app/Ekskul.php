<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ekskul extends Model
{
    use SoftDeletes;

    protected $table = 'ekskul';

    protected $fillable = [
        'nis',
        'siswa',
        'kelas',
        'kegiatan',
        'keterangan', 
    ];
}
