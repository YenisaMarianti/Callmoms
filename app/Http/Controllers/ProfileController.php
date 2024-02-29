<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfile($id) {
        $data = DB::table('users')->where('id', $id)->first();

        return view('profiles.profiles', compact('data'));
    }

    public function updateProfile(Request $request, $id) {
        try {
            if($request->no_telepon !== session('users_data')->no_telepon) {
                $request->validate([
                    'nama' => 'required',
                    'no_telepon' => 'required|unique:users',
                ]);
            }
            else {
                $request->validate([
                    'nama' => 'required',
                    'no_telepon' => 'required',
                ]);
            }
    
            $user = User::find($id);
    
            if($request->sandi === null) {
                $user->nama = $request->nama;
                $user->no_telepon = $request->no_telepon;
    
                $user->save();
            } else {
                $user->nama = $request->nama;
                $user->no_telepon = $request->no_telepon;
                $user->sandi = Hash::make($request->sandi);

                $user->save();
            }
    
            return back()->with('success-update-profile', 'Berhasil Mengupdate Profile Anda');
        } catch (\Exception $e) {
            return back()->with('failed-update-profile', $e->getMessage());
        }
    }
}
