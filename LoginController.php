<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login'    => 'required|string',
            'password' => 'required|string',
        ]);

        $user = Pengguna::where('username', $request->login)
                        ->orWhere('nik', $request->login)
                        ->first();

                        // control admin dan batasi petugas 

       if ($user && Hash::check($request->password, $user->password)) {
    Auth::login($user, $request->filled('remember'));

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'petugas') {
        return redirect()->route('admin.pengaduan.index');
    }

    return redirect()->route('landing');
}


        return back()->withErrors([
            'login' => 'Username/NIK atau password salah.'
        ])->onlyInput('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


    protected function authenticated(Request $request, $user)
{
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'petugas') {
        return redirect()->route('admin.pengaduan.index');
        // langsung ke daftar pengaduan
    }

    return redirect('/');
}



}
