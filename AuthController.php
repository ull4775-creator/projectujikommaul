<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari pengguna berdasarkan username atau NIK
        $pengguna = \App\Models\Pengguna::where('username', $credentials['login'])
                    ->orWhere('nik', $credentials['login'])
                    ->first();

        if ($pengguna && \Hash::check($credentials['password'], $pengguna->password)) {
            Auth::login($pengguna);
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'login' => 'Username/NIK atau password salah.',
        ]);
    }
}
