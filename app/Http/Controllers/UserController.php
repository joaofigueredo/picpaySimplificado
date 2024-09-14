<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(UsuarioRequest $request)
    {
        // dd($request->all());

        $data['cpf'] = $request->cpf;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['usuario'] = $request->opcoes;


        $data['password'] = Hash::make($data['password']);


        // $user = User::create([
        //     'cpf' => $data['cpf'],
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => $data['password'],
        //     'usuario' => $data['usuario']
        // ]);


        $user = new User;
        $user->cpf = $data['cpf'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->usuario = $data['usuario'];
        $user->saldo = 0;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();





        Auth::login($user);

        return to_route('home.index');
    }
}
