<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuisUser extends Model
{
    use HasFactory;
    protected $table = 'kuis_user';
     protected $fillable = [
        'id',
        'user_id',
        'materi_id',
        'nilai',
        'status'
        
    ];
}
