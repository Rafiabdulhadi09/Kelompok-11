<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMateri extends Model
{
    use HasFactory;
    protected $table = 'sub_materi';
    protected $fillable = 
    [
        'title',
        'type',
        'content'
    ];
    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
     public function kuis()
    {
        return $this->hasMany(Kuis::class, 'submateri_id');
    }
}
