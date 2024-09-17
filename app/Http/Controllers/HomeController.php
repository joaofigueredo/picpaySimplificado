<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\User;
use Error;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        if ($request->valor < 0 || $request->valor == null) {
            return to_route('home.index')->withErrors('valor invalido');
        } else {
            if ($request->opcoes == 1) {
                $cpf = $request->user()->cpf;
                $usuario = User::where('cpf', $cpf)->first();
                $usuario->saldo += $request->valor;
                $usuario->save();
                return view('home.index')->with('mensagemSucesso', 'Depositado realizado com sucesso!');
            } elseif ($request->opcoes == 2) {
                try {
                    $destinatario = User::where('cpf', $request->cpf)->first();

                    $destinatario->saldo += $request->valor;
                    $destinatario->save();

                    $usuario = Auth::user();
                    $usuarioNome = $usuario->name;
                    $transferencia = [
                        'valor' => $request->valor,
                        'remetente' => $usuarioNome,
                        'destinatario' => $destinatario->name
                    ];

                    // dd($destinatario->email);

                    Mail::to($destinatario->email)->send(new Email($transferencia));


                    return to_route('home.index')->with('mensagemSucesso', 'Transacao realizada com sucesso');
                } catch (Throwable $e) {
                    return to_route('home.index')->withErrors('CPF invalido');
                }
            } elseif ($request->cpf === null) {
                return to_route('home.index')->withErrors('Opcao invalida!');
            }
        }
    }

    public function contas()
    {
        $contas = DB::table('users')->get();

        return view('home.contas')->with('contas', $contas);
    }
}
