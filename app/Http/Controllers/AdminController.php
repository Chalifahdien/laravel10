<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('ADMIN/index', [
            'tittle' => 'Admin',
            'total_pengguna' => User::count(),
            'permintaan' => Pekerjaan::where('id_status', '=', 1)->get(),
            'tersedia' => Pekerjaan::where('id_status', '=', 3)->get()
            // 'pekerjaans' => Pekerjaan::get(),
        ]);
    }

    public function request()
    {
        return view('ADMIN/Pekerjaan/permintaan', [
            'tittle' => 'Permintaan Pengajuan',
            // 'pekerjaans' => Pekerjaan::get()
            'pekerjaans' => Pekerjaan::with('pengguna')->get()
        ]);
    }
    public function ongoing()
    {
        return view('ADMIN/Pekerjaan/berjalan', [
            'tittle' => 'Pekerjaan Tersedia',
            'pekerjaans' => Pekerjaan::get()
        ]);
    }

    public function history()
    {
        return view('ADMIN/Pekerjaan/riwayat', [
            'tittle' => 'Riwayat Tersedia',
            'pekerjaans' => Pekerjaan::get()
        ]);
    }

    public function detailPekerjaan(Pekerjaan $pekerjaan)
    {
        return view('ADMIN/Pekerjaan/detail', [
            'tittle' => 'Detail Pekerjaan',
            'name' => 'Chalifahdien Hamud',
            'pekerjaan' => $pekerjaan
        ]);
    }

    public function pekerjaanUser(User $pengguna)
    {
        return view('Admin/Pekerjaan/pekerjaanuser', [
            'tittle' => 'Pekerjaan By' . $pengguna->nama_lengkap,
            'nama' => $pengguna->nama_lengkap,
            'pekerjaans' => $pengguna->pekerjaan
        ]);
    }
    
    public function users()
    {
        return view('ADMIN/user', [
            'tittle' => 'Users',
            'penggunas' => User::get()
        ]);
    }

    public function accept($id_pekerjaan)
    {
        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);
        $pekerjaan->id_status = 3; 
        $pekerjaan->save();

        return redirect()->route('request', $pekerjaan->id_pekerjaan)->with('success', 'Pekerjaan diterima');
    }

    public function reject($id_pekerjaan)
    {
        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);
        $pekerjaan->id_status = 5; 
        $pekerjaan->save();

        return redirect()->route('request')->with('tolak', 'Pekerjaan Dibatalkan');
    }

}
