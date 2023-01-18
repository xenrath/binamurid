<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'mapel_id',
        'pendidik_id',
        'anak_id',
        'tanggal',
        'catatan',
        'nilai'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function pendidik()
    {
        return $this->belongsTo(User::class);
    }

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
}
