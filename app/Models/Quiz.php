<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'start_time', 'end_time'];

    public function pakets()
    {
        return $this->belongsToMany(Paket::class, 'paket_quiz');
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'quiz_kelas');
    }
}
