<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function store(LoginRequest $request)
    {
        $login = $request->only(['email', 'password']);

        if (!Auth::attempt($login)) {
            return to_route('login');
        }
        return to_route('home.index');
    }

    public function destroy()
    {
        Auth::logout();
        return to_route('login');
    }
}
