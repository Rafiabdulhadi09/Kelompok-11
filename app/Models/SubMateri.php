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
        'content',
        'materi_id',
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
