<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Komentar;
use App\Models\Pekerjaan;
use App\Models\Notifikasi;
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
            'notifikasi' => Notifikasi::where('id_pengguna', auth()->user()->id_pengguna)->get(),
            'blmdibaca' => Notifikasi::where('id_pengguna', auth()->user()->id_pengguna)->where('telah_dibaca', false)->count(),
            'ajuan' => Pekerjaan::where('id_pengguna', auth()->user()->id_pengguna)->get()
        ]); 
    }

    public function profil()
    {   
        return view('USER/profil', [
            'tittle' => auth()->user()->nama_lengkap,
            'pekerjaans' => Pekerjaan::get(),
            'notifikasi' => Notifikasi::where('id_pengguna', auth()->user()->id_pengguna)->get(),
            'blmdibaca' => Notifikasi::where('id_pengguna', auth()->user()->id_pengguna)->where('telah_dibaca', false)->count()
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
            'pekerjaans' => Pekerjaan::with('pengguna')->get(),
            'notifikasi' => Notifikasi::where('id_pengguna', auth()->user()->id_pengguna)->get(),
            'blmdibaca' => Notifikasi::where('telah_dibaca', false)->count(),
        ]);
    }

    public function detailPekerjaan(Pekerjaan $pekerjaan)
    {
        return view('USER/Pekerjaan/detail', [
            'tittle' => 'Detail Pekerjaan',
            'name' => 'Chalifahdien Hamud',
            'pekerjaan' => $pekerjaan,
            'notifikasi' => Notifikasi::where('id_pengguna', Auth::id())->get(),
            'blmdibaca' => Notifikasi::where('id_pengguna', Auth::id())->where('telah_dibaca', false)->count(),
            'komentar' => Komentar::with('pengguna')->where('id_pekerjaan', $pekerjaan->id_pekerjaan)->get()
        ]);
    }

    public function pekerjaanUser(User $pengguna)
    {
        return view('USER/Pekerjaan/ambil', [
            'tittle' => 'Pekerjaan By' . $pengguna->nama_lengkap,
            'name' => 'Chalifahdien Hamud',
            'pekerjaans' => $pengguna->pekerjaan,
            'notifikasi' => Notifikasi::where('id_pengguna', auth()->user()->id_pengguna)->get(),
            'blmdibaca' => Notifikasi::where('telah_dibaca', false)->count()
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
        if ($pekerjaanDibawa->id_status != 4) {
            return back()->with('ambil', 'Anda sudah mengambil pekerjaan sebelumnya.');
        }

        $pekerjaan->id_pengambil = $userId;
        $pekerjaan->id_status = 2;
        $pekerjaan->save();

        Notifikasi::create([
            'id_pengguna' => $pekerjaan->id_pengguna, // Assuming this is the user who owns the job
            'pesan' => 'Pekerjaan ' . $pekerjaan->judul . ' telah ambil ' . auth()->user()->nama_lengkap,
            'telah_dibaca' => false,
            'tanggal_dibuat' => now(),
        ]);

        return redirect()->route('beranda')->with('success', 'Pekerjaan berhasil diambil.');
    }

    public function selesaiPekerjaan($id_pekerjaan)
    {
        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);
        $pekerjaan->id_status = 4; 
        $pekerjaan->save();

        Notifikasi::create([
            'id_pengguna' => $pekerjaan->id_pengguna, // Assuming this is the user who owns the job
            'pesan' => 'Pekerjaan ' . $pekerjaan->judul . ' telah selesai',
            'telah_dibaca' => false,
            'tanggal_dibuat' => now(),
        ]);

        return redirect()->route('beranda')->with('succes', 'Pekerjaan Telah Selesai');
    }

    public function ajukankembali($id_pekerjaan)
    {
        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);
        $pekerjaan->id_status = 1; 
        $pekerjaan->save();

        return redirect()->route('beranda')->with('succes', 'Pekerjaan Berhasil Diajukan Kembali');
    }

    public function hapusPekerjaan($id_pekerjaan)
    {
        // Mencari pekerjaan berdasarkan ID
        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);

        // Menghapus komentar yang berhubungan dengan pekerjaan tersebut
        $pekerjaan->komentar()->delete();

        // Menghapus pekerjaan
        $pekerjaan->delete();

        // Redirect kembali ke beranda dengan pesan sukses
        return redirect()->route('beranda')->with('hapus', 'Pekerjaan berhasil dihapus.');
    }



}
