<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'panggilan',
        'gender',
        'lahir',
        'foto',
        'orangtua_id'
    ];

    public function orangtua()
    {
        return $this->belongsTo(User::class);
    }
}
