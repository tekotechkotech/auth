<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'kelas'; // Menetapkan nama tabel
    protected $primaryKey = 'id_kelas';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'cabang_id',
        'wali_kelas',
        'nama',
        'deskripsi',
    ];

    public function cabang(): BelongsTo
    {
        return $this->belongsTo(InstansiCabang::class, 'cabang_id', 'id_instansi_cabang');
    }

    public function wali(): BelongsTo
    {
        return $this->belongsTo(Pengurus::class, 'wali_kelas', 'id_pengurus');
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_kelas');
    }
}
