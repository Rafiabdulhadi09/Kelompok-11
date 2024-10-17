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
        'submateri_id',
        'pertanyaan',
        'pilihan_1',
        'pilihan_2',
        'pilihan_3',
        'jawaban'
    ];
}
