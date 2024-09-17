<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function enviarEmail()
    {
        $usuario = Auth::user();
        $email = $usuario->email;
        Mail::to($email)->send(new Email());
        return view('home.index')->with('mensagemSucesso', 'email enviado com sucesso!');
    }
}
