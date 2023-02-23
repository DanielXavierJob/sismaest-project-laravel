<?php

namespace App\Http\Controllers\Pages\Modulos\Categorias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pkey extends Controller
{
    public function index()
    {
       return view('Dashboard.Pages.Modulos.Categorias.Pkey');
    }
}
