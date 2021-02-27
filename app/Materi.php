<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materi extends Model
{
    use SoftDeletes;

    protected $table = 'materi';

    protected $fillable = [
        'no',
        'judul',
        'kelas',
        'nama_mapel',
        'lampiran', 
        'link',
    ];
}
