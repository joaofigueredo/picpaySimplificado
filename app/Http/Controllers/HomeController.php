<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Illuminate\Container\Attributes\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function teste()
    {
        return view('home.teste');
    }

    public function transferencia(Request $request)
    {
        if ($request->valor < 0) {
            return to_route('home.index')->withErrors('valor invalido');
        } else {
            if ($request->opcoes == 1) {
                $cpf = $request->user()->cpf;
                $usuario = User::where('cpf', $cpf)->first();
                $usuario->saldo += $request->valor;
                $usuario->save();
                return to_route('home.index')->with('mensagem.sucesso', 'Depositado realizado com sucesso!');
            } elseif ($request->opcoes == 2) {
                try {
                    $receptor = User::where('cpf', $request->cpf)->first();

                    $receptor->saldo += $request->valor;
                    $receptor->save();

                    return to_route('home.index');
                } catch (Throwable $e) {
                    return to_route('home.index')->withErrors('Ação invalida');
                }
            }
        }
    }

    public function contas()
    {
        $contas = DB::table('users')->get();

        return view('home.contas')->with('contas', $contas);
    }
}
