<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login', [
            "title" => "Welcome"
        ]);
    }

    public function authenticate(Request $request) {
        $data = [
            'user_email' => $request->user_email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('/home')->with('loginSuccess', "<script>alert('Login berhasil')</script>");
        }

        return back()->with('pesan', "<script>alert('Username atau Password Salah')</script>");
    
    }

    public function store(Request $request) {
        // dd($request->user_alamat);
        $data = [
            'user_email' => $request->user_email,
            'password' => Hash::make($request->password),
            'user_alamat' => $request->user_alamat,
            'user_nama' => $request->user_nama,
            'user_hp' => $request->user_hp,
            'user_pos' => $request->user_pos
        ];
        
        User::create($data);
        
        return redirect('/login')->with('pesan', "<script>alert('Register berhasil, silahkan login sekarang!')</script>");
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
