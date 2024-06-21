<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';
    protected $primaryKey = 'id_pekerjaan';
    protected $fillable = ['id_pengguna', 'id_pengambil', 'judul', 'deskripsi', 'kategori', 'tenggat_waktu', 'lampiran', 'id_status'];

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    public function pengambil()
    {
        return $this->belongsTo(User::class, 'id_pengambil');
    }

    public function status()
    {
        return $this->belongsTo(StatusPekerjaan::class, 'id_status');
    }
}
