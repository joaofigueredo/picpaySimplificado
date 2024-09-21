<?php

namespace App\Http\Controllers;

use App\Events\EnvioEmail;
use App\Jobs\EnviaEmail;
use App\Jobs\ProcessaEmail;
use App\Jobs\TestJob;
use App\Mail\Email;
use App\Models\Transferencia;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

use function Laravel\Prompts\error;

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
                    if ($destinatario == null) {
                        return to_route('home.index')->withErrors('Usuario não encontrado!');
                    }
                    $destinatario->saldo += $request->valor;
                    $destinatario->save();

                    $usuario = Auth::user();
                    $usuarioNome = $usuario->name;
                    $dados = [
                        'valor' => $request->valor,
                        'remetente' => $usuarioNome,
                        'destinatario' => $destinatario->name,
                        'emailDestinatario' => $destinatario->email
                    ];

                    $job = TestJob::dispatch($dados);

                    return to_route('home.index')->with('mensagemSucesso', 'Transacao realizada com sucesso');
                } catch (Exception $e) {
                    return to_route('home.index')->withErrors('ERRO!');
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
