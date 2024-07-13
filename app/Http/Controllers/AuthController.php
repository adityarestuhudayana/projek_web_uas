<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required'],
            'address' => ['nullable'],
        ]);
        $validated['image'] = 'storage/' . $request->file('image')->store('images');

        User::create($validated);
        
        return redirect('login')->with('success', 'Register berhasil');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/')->with('toast_success', 'Berhasil login');
        }

        return redirect('/login')->with('errors', 'Username or password wrong');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'Logout berhasil');
    }
}
