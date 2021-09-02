<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    use HasFactory;
    protected $table = 'penyaluran';
    protected $primaryKey = 'id_penyaluran';
    protected $fillable = [
        "id_penerimaan"
    ];

    public function penerimaan()
    {
        return $this->belongsTo('App\Models\Penerimaan', 'id_penerimaan', 'id_penerimaan');
    }
}
