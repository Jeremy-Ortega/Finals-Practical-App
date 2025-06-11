<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    // Show register form
    public function showRegister() {
        return view('authenticated.register');
    }

    // Handle register
    public function register(Request $request) {
        // Validate form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encrypt password
        ]);

        // Log in user
        Auth::login($user);

        return redirect()->route('notes.index');
    }

    // Show login form
    public function showLogin() {
        return view('authenticated.login');
    }

    // Handle login
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login success
            return redirect()->route('notes.index');
        }

        // Login failed
        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    // Logout
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
