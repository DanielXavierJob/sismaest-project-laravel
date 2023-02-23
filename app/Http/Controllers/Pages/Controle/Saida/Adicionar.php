<?php

namespace App\Http\Controllers\Pages\Controle\Saida;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Adicionar extends Controller
{
    public function index()
    {
       return view('Dashboard.Pages.Controle.Saida.Adicionar');
    }
}
