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
        'materi_id',
        'pertanyaan',
        'pilihan_1',
        'pilihan_2',
        'pilihan_3',
        'jawaban'
    ];
     public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
     public function users()
    {
        return $this->belongsToMany(User::class, 'kuis_user')
                    ->withPivot('nilai', 'status')
                    ->withTimestamps();
    }
}
