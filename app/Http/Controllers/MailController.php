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

        return view('emails.email')->with('mensagemSucesso', 'email enviado com sucesso!');
    }
}
