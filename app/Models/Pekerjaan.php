<?php

namespace App\Models;

use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function komentar(): HasMany
    {
        return $this->hasMany(Komentar::class, 'id_pekerjaan');
    }
}
