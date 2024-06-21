<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $pekerjaan = Pekerjaan::where('id_pengambil', auth()->user()->id_pengguna)->get(); // Mengambil pekerjaan berdasarkan id_pengambil yang cocok
        return view('USER/index', [
            'tittle' => auth()->user()->nama_lengkap,
            'pekerjaan' => $pekerjaan,
        ]); 
    }

    public function adminview()
    {
        $pengguna = User::all();
        return response()->json($pengguna);
    }

    public function ambil()
    {
        return view('USER/Pekerjaan/ambil', [
            'tittle' => 'Pekerjaan Tersedia',
            'name' => 'Chalifahdien Hamud',
            'pekerjaans' => Pekerjaan::with('pengguna')->get()
        ]);
    }

    public function detailPekerjaan(Pekerjaan $pekerjaan)
    {
        return view('USER/Pekerjaan/detail', [
            'tittle' => 'Detail Pekerjaan',
            'name' => 'Chalifahdien Hamud',
            'pekerjaan' => $pekerjaan
        ]);
    }

    public function pekerjaanUser(User $pengguna)
    {
        return view('USER/Pekerjaan/ambil', [
            'tittle' => 'Pekerjaan By' . $pengguna->nama_lengkap,
            'name' => 'Chalifahdien Hamud',
            'pekerjaans' => $pengguna->pekerjaan
        ]);
    }

    public function ambilPekerjaan($id_pekerjaan)
    {
        $userId = auth()->user()->id_pengguna; 

        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);
        if ($pekerjaan->id_pengguna == $userId) {
            return back()->with('ambil', 'Anda tidak dapat mengambil pekerjaan yang telah Anda buat.');
        }

        $pekerjaanDibawa = Pekerjaan::where('id_pengambil', $userId)->first();
        if ($pekerjaanDibawa) {
            return back()->with('ambil', 'Anda sudah mengambil pekerjaan sebelumnya.');
        }

        $pekerjaan->id_pengambil = $userId;
        $pekerjaan->id_status = 2;
        $pekerjaan->save();

        return redirect()->route('beranda')->with('success', 'Pekerjaan berhasil diambil.');
    }

    public function selesaiPekerjaan($id_pekerjaan)
    {
        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);
        $pekerjaan->id_status = 4; 
        $pekerjaan->id_pengambil = null; 
        $pekerjaan->save();

        return redirect()->route('beranda')->with('tolak', 'Pekerjaan Dibatalkan');
    }


}
