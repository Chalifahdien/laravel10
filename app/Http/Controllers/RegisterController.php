<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('LOGIN/register', ['tittle' => 'Register']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => ['required', 'unique:users', 'email:dns'],
            'telepon' => ['required', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);
        $validatedData['id_peran'] = 2;
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with(
            'success',
            'Registrasi berhasil!'
        );
    }
}
