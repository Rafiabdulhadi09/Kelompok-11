<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    use HasFactory;
    protected $table = 'kuis';
     protected $fillable = [
        'id',
        'kelas_id',
        'pertanyaan',
        'pilihan_1',
        'pilihan_2',
        'pilihan_3',
        'jawaban'
    ];
     public function kelas()
    {
        return $this->belongsTo(DataKelas::class, 'kelas_id');
    }
     public function users()
    {
        return $this->belongsToMany(User::class, 'kuis_user')
                    ->withPivot('nilai', 'status')
                    ->withTimestamps();
    }
}
