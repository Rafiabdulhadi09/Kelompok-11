<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSosial extends Model
{
    use HasFactory;
    protected $table ='sosial_media';
    protected $fillable =[
        'id',
        'instagram',
        'youtube',
        'x',
    ];
}
