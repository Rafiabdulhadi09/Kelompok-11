<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasTrainer extends Model
{
    use HasFactory;
    protected $table = 'trainerkelas';
    protected $fillable = [
        'id',
        'user_id',
        'kelas_id'
    ];
}
