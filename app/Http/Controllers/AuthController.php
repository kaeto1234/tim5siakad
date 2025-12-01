<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // process login
    public function login(Request $r)
    {
        $r->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($r->only('email','password'), $r->filled('remember'))) {
            $r->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email'=>'Email atau password salah'])->withInput();
    }

    // show register form
    public function showRegister()
    {
        return view('auth.register');
    }

    // process register
    public function register(Request $r)
    {
        $r->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:admin,dosen,mahasiswa',
        ]);

        $user = User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password),
            'role' => $r->role,
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }

    // logout
    public function logout(Request $r)
    {
        Auth::logout();
        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect()->route('login');
    }
}
