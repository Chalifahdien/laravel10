<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id_pengguna';
    protected $fillable = ['nama_lengkap', 'email', 'telepon', 'password', 'foto_profil', 'id_peran'];

    public function peran()
    {
        return $this->belongsTo(Peran::class, 'id_peran');
    }

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class, 'id_pengguna');
    }

    public function pekerjaanAktif()
    {
        return $this->hasOne(Pekerjaan::class, 'id_pengambil')->where('is_active', true);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
