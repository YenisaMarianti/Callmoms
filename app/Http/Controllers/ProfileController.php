<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
                // Delete the old photo if it exists
                if ($user->foto) {
                    File::delete(public_path('uploads/' . $user->foto));
                }
    
                // Upload the new photo
                $file = $request->file('foto');
                $fileName = Str::random(32) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $fileName);
                $user->foto = $fileName;
            }
    
            if ($request->filled('sandi')) {
                $user->sandi = Hash::make($request->sandi);
            }
    
            session(['users_data' => $user]);
    
            $user->save();
    
            return back()->with('success-update-profile', 'Berhasil Mengupdate Profile Anda');
        } catch (\Exception $e) {
            return back()->with('failed-update-profile', $e->getMessage());
        }
    }
}
