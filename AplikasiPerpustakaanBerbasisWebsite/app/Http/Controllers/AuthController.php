<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin($role = null) {
        if ($role === 'admin') {
            return view('auth.login-admin', compact('role'));
        } elseif ($role === 'siswa') {
            return view('auth.login-siswa', compact('role'));
        } else {
            abort(404); // atau bisa redirect ke login default
        }
    }
    

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $role = $request->input('role');
    
        $user = User::where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            if ($role && $user->role !== $role) {
                return back()->withErrors(['email' => 'Role tidak cocok']);
            }
    
            Auth::login($user);
            // ⛳️ Ubah redirect ke eperpus, tidak lagi ke dashboard
            return redirect()->route('eperpus');
        }
    
        return back()->withErrors(['email' => 'Email atau password salah']);
    }
    

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required|in:admin,siswa'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login', ['role' => $request->role])->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
