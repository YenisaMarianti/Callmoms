<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegister() {
        return view('authentication/sign-up');
    }

    public function storeUserData(Request $request) {
        try {
            $request->validate([
                'nama' => 'required',
                'no_telepon' => 'required|unique:users',
                'peran' => 'required',
                'jenis_kelamin' => 'required',
                'sandi' => 'required',
            ]);
    
            $user = new User();
            $user->nama = $request->nama;
            $user->no_telepon = $request->no_telepon;
            $user->peran = $request->peran;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->sandi = Hash::make($request->sandi);
            $user->save();
    
            return back()->with('success-registration', 'Berhasil Mendaftarkan Akun Baru');
        } catch (\Exception $e) {
            return back()->with('failed-registration', $e->getMessage());
        }
    }
}
