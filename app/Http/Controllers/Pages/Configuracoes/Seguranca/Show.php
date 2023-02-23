<?php

namespace App\Http\Controllers\Pages\Configuracoes\Seguranca;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Show extends Controller
{
    public function index()
    {
       return view('Dashboard.Pages.Configuracoes.Seguranca.Inicio');
    }
}
