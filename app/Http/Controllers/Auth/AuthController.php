<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* ================= LOGIN ================= */

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (! Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau password salah',
            ]);
        }

        $user = Auth::user();

        // REDIRECT SESUAI ROLE
        return match ($user->role) {
            'admin'   => redirect()->route('admin.dashboard'),
            'lecturer'=> redirect()->route('dosen.dashboard'),
            'student' => redirect()->route('mahasiswa.dashboard'),
            default   => redirect('/'),
        };
    }

    /* ================= REGISTER (ADMIN ONLY) ================= */

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'admin', // 🔥 FIX: ADMIN ONLY
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Admin berhasil dibuat');
    }

    /* ================= LOGOUT ================= */

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
