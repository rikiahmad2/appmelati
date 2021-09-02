<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;
    protected $table = 'penerimaan';
    protected $primaryKey = 'id_penerimaan';
    protected $fillable = [
        "id_mustahik",
        "id_muzakki",
        "id_bank",
        "id_user",
        "jenis",
        "cara_pembayaran",
        "bentuk_pembayaran",
        "jumlah_pembayaran"
    ];

    public function mustahik()
    {
        return $this->belongsTo('App\Models\Mustahik', 'id_mustahik');
    }

    public function muzakki()
    {
        return $this->belongsTo('App\Models\Muzakki', 'id_muzakki');
    }

    public function bank()
    {
        return $this->belongsTo('App\Models\Bank', 'id_bank', 'id_bank');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}