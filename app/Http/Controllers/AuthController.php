<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Login
    public function login()
    {
        if (Auth::check() == true) {

            //arahkan ke routing dashboard
            return redirect('dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        session([
            'email' => $user->email,
            'nama' => $user->nama,
            'jabatan' => $user->jabatan,
            'role' => $user->role
        ]);

        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     return redirect('/login')->with('errors', 'Password yang anda masukkan salah');
        // }
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('dashboard')->with('success', 'Anda Berhasil Login');
        } else {
            return redirect('/')->with('errors', 'Username atau password yang Anda masukkan salah');
        }
    }



    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     return redirect('/login')->with('success', 'Anda Berhasil Logout');
    // }

    public function logout()
    {
        // menghapus session yang login
        Auth::logout();

        // arahkan ke routing yang namanya login
        return redirect('/')->with('success', 'Anda Berhasil Logout');
    }
}
