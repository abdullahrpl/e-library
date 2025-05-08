<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class authController extends Controller
{
    /**
     * Display register
     */
    public function showRegister()
    {
        return view('auth.register');
    }


    /**
     * Make new account
     */
    public function register(Request $request)
    {
        $data = new User;
        // $request->validate([
        //     'username'     => 'required',
        //     'email'    => 'required|email|unique:users,email',
        //     'password' => 'required|min:6'
        // ]);

        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        // $data->role = 'admin';
        $data->save();
        Auth::login($data);
        $request->session()->flash('welcome', 'Selamat datang, ' . $data->username . '!');

        return redirect()->route('home');
    }

    /**
     * Show login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Login into exiting account
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('welcome', 'Selamat datang kembali, ' . Auth::user()->username . '!');
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard'); // route ke admin
            } else {
                return redirect()->route('home'); // route user biasa
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
