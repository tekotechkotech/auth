<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function soals()
    {
        return $this->belongsToMany(Soal::class, 'paket_soal');
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'paket_quiz');
    }
}
