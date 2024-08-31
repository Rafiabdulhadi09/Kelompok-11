<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'trainers';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Menggunakan mutator untuk hash password secara otomatis
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
