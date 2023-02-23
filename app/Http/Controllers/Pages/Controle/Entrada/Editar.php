<?php

namespace App\Http\Controllers\Pages\Controle\Entrada;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Editar extends Controller
{
    public function index()
    {
       return view('Dashboard.Pages.Controle.Entrada.Editar');
    }
}
