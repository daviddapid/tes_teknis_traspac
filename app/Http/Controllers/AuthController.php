<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function loginView()
    {
        return view('pages.auth.login');
    }
    function loginAction(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->intended(route('pegawai.index'));
        }
        return back()->withErrors([
            'username' => 'data user tidak valid',
        ])->onlyInput('username');
    }
    function registerView()
    {
        return view('pages.auth.register');
    }
    function registerAction(RegisterRequest $request)
    {
        $u = User::create($request->validated());

        if (Auth::attempt($u)) {
            $request->session()->regenerate();

            return redirect()->intended(route('pegawai.index'));
        }

        return view('pages.auth.register');
    }
}
