<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show login view
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Process a login request
     */
    public function processLogin(Request $request)
    {
        $validated_inputs = $request->validate([
            'email' => 'required|email:rfc,dns|max:100',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated_inputs)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect'
        ])->onlyInput('email');
    }


    /**
     * Show resgistration view
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Process registration
     */
    public function processRegister(Request $request)
    {
        $validated_inputs = $request->validate([
            'username' => 'required|string|min:3|max:50|unique:users',
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|email:rfc,dns|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $validated_inputs['password'] = Hash::make($validated_inputs['password']);

        $user = User::create($validated_inputs);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
