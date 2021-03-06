<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapel extends Model
{
    use SoftDeletes;

    protected $table = 'mapel';

    protected $fillable = [
        'kode_mapel',
        'mata_pelajaran',
        'detail_mapel',
        'kelas',
    ];
}
