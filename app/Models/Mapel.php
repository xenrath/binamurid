<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'keterangan',
        'tanggal_awal',
        'tanggal_akhir'
    ];

    // public function orangtua()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
