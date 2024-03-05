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
            $user = User::find($id);
    
            if (!$user) {
                throw new \Exception('User not found');
            }
    
            $validationRules = [
                'nama' => 'required',
                'no_telepon' => 'required',
                'alamat' => 'required',
            ];
    
            if ($request->no_telepon !== $user->no_telepon) {
                $validationRules['no_telepon'] .= '|unique:users';
            }
    
            $request->validate($validationRules);
    
            $user->nama = $request->nama;
            $user->no_telepon = $request->no_telepon;
            $user->alamat = $request->alamat;
    
            if ($request->hasFile('foto')) {
                // Handle file upload here, such as storing it in a storage directory
                $file = $request->file('foto');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
                $user->foto = $fileName;
            }
    
            if ($request->filled('sandi')) {
                $user->sandi = Hash::make($request->sandi);
            }
    
            $user->save();
    
            return back()->with('success-update-profile', 'Berhasil Mengupdate Profile Anda');
        } catch (\Exception $e) {
            return back()->with('failed-update-profile', $e->getMessage());
        }
    }
}
