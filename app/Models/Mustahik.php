<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mustahik extends Model
{
    use HasFactory;
    protected $table = 'mustahik';
    protected $fillable = [
        "name",
        "kriteria",
        "no_kk",
        "nik",
        "alamat",
        "notelp",
        "kerja_suami",
        "kerja_istri",
        "jumlah_jiwa"
    ];
}
