<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLogin()
    {
        return view('auth.login'); // pastikan ada file resources/views/auth/login.blade.php
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // ⬅️ WAJIB supaya session login valid

        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } elseif ($role === 'kasir') {
            return redirect()->intended('/kasir/dashboard');
        }

        Auth::logout();
        return redirect()->back()->withErrors(['role' => 'Role tidak dikenali']);
    }

    return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
