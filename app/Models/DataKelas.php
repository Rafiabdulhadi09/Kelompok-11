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
}
