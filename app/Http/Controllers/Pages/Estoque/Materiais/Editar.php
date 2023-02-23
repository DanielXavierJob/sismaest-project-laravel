<?php

namespace App\Http\Controllers\Pages\Estoque\Materiais;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Editar extends Controller
{
    public function index()
    {
       return view('Dashboard.Pages.Estoque.Materiais.Editar');
    }
}
