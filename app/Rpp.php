<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rpp extends Model
{
    use SoftDeletes;

    protected $table = 'rpp';

    protected $fillable = [
        'no',
        'nik',
        'guru',
        'mapel',
        'ki', 
        'kd',
        'lampiran',
    ];
}
