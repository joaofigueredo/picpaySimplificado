<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use function Laravel\Prompts\error;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function transferencia(Request $request)
    {
        if ($request->valor <= 0 || $request->valor == null) {
            return to_route('home.index')->withErrors('Valor invalido!');
        } else {
            if ($request->opcoes == 1) {
                $usuario =  $request->user();
                $usuario->saldo += $request->valor;
                $usuario->save();

                return to_route('home.index')->with('mensagemSucesso', 'Deposito realizado com sucesso!');
            } elseif ($request->opcoes == 2) {
                try {
                    $destinatario = User::where('cpf', $request->cpf)->first();
                    if ($destinatario == null) {
                        return to_route('home.index')->withErrors('Usuario não encontrado!');
                    }
                    $destinatario->saldo += $request->valor;
                    $destinatario->save();

                    $usuario = Auth::user();

                    $dados = [
                        'valor' => $request->valor,
                        'remetente' => $usuario->name,
                        'destinatario' => $destinatario->name,
                        'emailDestinatario' => $destinatario->email
                    ];

                    TestJob::dispatch($dados);

                    return to_route('home.index')->with('mensagemSucesso', 'Transacao realizada com sucesso');
                } catch (Exception $e) {
                    return to_route('home.index')->withErrors('ERRO!');
                }
            }
        }
    }

    public function contas()
    {
        $contas = DB::table('users')->orderby('name')->get();

        return view('home.contas')->with('contas', $contas);
    }
}
