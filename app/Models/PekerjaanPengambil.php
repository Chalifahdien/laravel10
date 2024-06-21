<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanPengambil extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_pengambil';
    protected $fillable = ['id_pengambil', 'id_pekerjaan', 'tanggal_diambil'];

    public function pengambil()
    {
        return $this->belongsTo(User::class, 'id_pengambil');
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan');
    }
}

