<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';
    protected $primaryKey = 'id_komentar';
    protected $fillable = ['id_pekerjaan', 'id_pengguna', 'teks_komentar'];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan');
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}

