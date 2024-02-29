<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function showLogin() {
        return view('authentication/sign-in');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'no_telepon' => 'required',
            'sandi' => 'required',
        ]);
    
        $user = User::where('no_telepon', $request->no_telepon)->first();
    
        if (!$user || !Hash::check($request->sandi, $user->sandi)) {
            return back()->withErrors([
                'message' => 'No Telepon atau Kata Sandi salah.',
            ]);
        }

        session(['users_data' => $user]);
    
        return redirect()->intended('/dashboard');

    }

    public function logout(Request $request) {
        $request->session()->forget('users_data');

        return redirect('/sign-in');
    }
}
