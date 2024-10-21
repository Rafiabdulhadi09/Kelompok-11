<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   protected $fillable = [
        'name',
        'email',
        'image',
        'jk',
        'alamat',
        'keahlian',
        'password',
        'role',
    ]; 
    public function trainerKelas()
    {
        return $this->belongsToMany(DataKelas::class, 'trainerkelas', 'user_id', 'kelas_id');
    }

        public function kelas()
    {
        return $this->belongsToMany(DataKelas::class, 'user_kelas');
    }

        public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
     public function subMateri()
    {
        return $this->belongsToMany(SubMateri::class, 'kuis_user')
                    ->withPivot('nilai', 'status')
                    ->withTimestamps();
    }

    // Relasi ke model Kuis melalui tabel pivot kuis_user (Many-to-Many)
    public function kuis()
    {
        return $this->belongsToMany(Kuis::class, 'kuis_user')
                    ->withPivot('nilai', 'status')
                    ->withTimestamps();
    }
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var arr=ay<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
