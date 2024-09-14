<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {

        $login = $request->only(['email', 'password']);

        // $user = User::where('email', $login['email'])->first();


        if (!Auth::attempt($login)) {

            return to_route('login')->withErrors(['Usuário ou senha inválido!']);
        }
        if (Auth::attempt($login)) {
            return to_route('home.index');
        }


        return to_route('home.index');
    }

    public function destroy()
    {
        Auth::logout();

        return to_route('login');
    }
}
