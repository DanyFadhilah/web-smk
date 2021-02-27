<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    public $table = "jadwal";
    use SoftDeletes;

    protected $fillable = [
        'semester',
        'tahun',
        'kelas',
        'mapel',
        'jam',
        'nama_guru',
    ];
}
