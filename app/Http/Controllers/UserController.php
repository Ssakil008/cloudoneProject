<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('layouts.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'credential_for' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'url' => 'required|url',
            'ip_address' => 'ip',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed:confirm_password'
        ]);

        $user = User::create([
            'credential_for' => $request->credential_for,
            'email' => $request->email,
            'url' => $request->url,
            'ip_address' => $request->ip_address,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('layouts.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
