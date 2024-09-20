<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKelas extends Model
{
    use HasFactory;
    protected $table = 'data_kelas';
    protected $fillable = [
        'title',
        'price',
        'image',
        'description',
    ]; 
     public function materi()
    {
        return $this->hasMany(Materi::class, 'kelas_id');
    }
    public function trainers()
    {
        return $this->belongsToMany(User::class, 'trainerkelas', 'kelas_id', 'user_id')->where('role', 'trainer');
    }
}
