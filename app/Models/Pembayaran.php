<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table ='pembayaran';
    protected $fillable =[
        'id',
        'kelas_id',
        'user_id',
        'bukti_pembayaran',
        'status',
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(DataKelas::class);
    }
}
