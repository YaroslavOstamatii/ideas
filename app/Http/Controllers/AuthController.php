<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $data = request()->validate([
            'name'=>'required|min:3|max:40',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|confirmed',
        ]);
        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);
        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $data = request()->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:8',
        ]);

        if (Auth::attempt($data)) {
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success','Logged in successfully');
        }

        return redirect()->route('login')->withErrors(['email' => 'The provided credentials do not match our records.',]);
    }
    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect()->route('dashboard')->with(['success' => 'Logout success']);
    }
}
