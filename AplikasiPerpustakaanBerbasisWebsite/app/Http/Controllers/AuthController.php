<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                return redirect()->route('dashboard.index');
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember_me');
        try {
            if (Auth::attempt($credentials, $remember)) {
                return redirect()->route('dashboard.index')->with('success', 'Login berhasil');
            } else {
                return redirect()->back()->with('error', 'Email atau password salah');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
        if (!$request->email || !$request->name || !$request->password || !$request->password_confirmation) {
            return redirect()->back()->with('error', 'Harap lengkapi semua kolom');
        }

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'password.required' => 'Password harus diisi',
                'password_confirmation.required' => 'Konfirmasi Password harus diisi',
                'password_confirmation.same' => 'Konfirmasi Password tidak sama',
            ]
        );
        try {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->remember_token = Str::random(60);
            $user->save();

            return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silahkan login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Pendaftaran gagal, silahkan coba lagi');
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // dd($googleUser);

            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                if (is_null($user->google_id)) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                }
            } else {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(8)),
                    'google_id' => $googleUser->getId(),
                ]);
            }

            Auth::login($user);

            return redirect()->route('dashboard.index')->with('success', 'Login Berhasil');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Login gagal: ' . $e->getMessage());
        }
    }

}
