<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmpanBalik extends Model
{
    use HasFactory;

    protected $table = 'umpan_balik';
    protected $primaryKey = 'id_umpan_balik';
    protected $fillable = ['id_pekerjaan', 'id_pengguna', 'penilaian', 'teks_umpan_balik'];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan');
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}

