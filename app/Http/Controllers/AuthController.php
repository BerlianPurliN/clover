<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // --- REGISTRASI ---

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'nickname' => 'required|string|max:50',
            'mobile_phone' => 'nullable|string|max:15',
            'gender' => 'nullable|string|max:10',
            'dob' => 'nullable|date',
            'role' => 'nullable|string|max:20',
        ]);

        // 2. Buat user baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'nickname' => $validated['nickname'],
            'mobile_phone' => $validated['mobile_phone'],
            'gender' => $validated['gender'],
            'dob' => $validated['dob'],
            'role' => $validated['role'] ?? 'customer',
        ]);

        // 3. Login user yang baru dibuat
        Auth::login($user);

        // 4. Redirect ke halaman yang diinginkan setelah registrasi
        return redirect('/email/verify');
    }

    // --- LOGIN ---

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Coba lakukan autentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            activity()->log('User Logged In');

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/manage/appointments');
            } else if ($user->role === 'customer') {
                return redirect()->intended('/dashboard');
            }

            return redirect('/');
        }

        // 3. Jika gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // --- LOGOUT ---

    public function logout(Request $request)
    {
        activity()->causedBy(Auth::user())->log('User Logged Out');

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
