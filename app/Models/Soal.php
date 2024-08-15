<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = ['question_text'];

    public function pakets()
    {
        return $this->belongsToMany(Paket::class, 'paket_soal');
    }
}
