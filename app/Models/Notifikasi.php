<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';
    protected $primaryKey = 'id_notifikasi';
    protected $fillable = ['id_pengguna', 'pesan', 'telah_dibaca', 'tanggal_dibuat'];

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}

