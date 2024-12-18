<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materi';
    protected $fillable = [
        'id',
        'title',
        'content'
        
    ];
    public function kelas()
    {
        return $this->belongsTo(DataKelas::class, 'kelas_id');
    }
    public function submateri()
    {
        return $this->hasMany(SubMateri::class, 'materi_id');
    }
    public function kelastrainer()
    {
        return $this->belongsTo(KelasTrainer::class, 'kelas_id');
    }
}
