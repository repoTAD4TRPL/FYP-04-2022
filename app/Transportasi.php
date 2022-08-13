<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    protected $table = "transportasi";

    protected $fillabel = [
        'nama_loket',
    ];
    public $timestamps = false;
}
