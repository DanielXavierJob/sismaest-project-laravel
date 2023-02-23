<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function Configuracoes($var){
        dd($var);
      
    }
    public function index($page)
    {
            $exploded = explode("/", $page);
            
            switch ($exploded[0]) {
                case 'Configuracoes':
                    switch ($exploded[1]) {
                        case 'Painel':
                            return view('Dashboard.Pages.Configuracoes.Painel.' . $exploded[2]);
                            break;
                        case 'Seguranca':
                            return view('Dashboard.Pages.Configuracoes.Seguranca.' . $exploded[2]);
                            break;
                        case 'Sistema':
                            return view('Dashboard.Pages.Configuracoes.Sistema.' . $exploded[2]);
                            break;
                        case 'Usuario':
                            return view('Dashboard.Pages.Configuracoes.Usuario.' . $exploded[2]);
                            break;
                    }
                    break;
                case 'Controle':
                    switch ($exploded[1]) {
                        case 'Entrada':
                            return view('Dashboard.Pages.Controle.Entrada.' . $exploded[2]);
                            break;
                        case 'Saida':
                            return view('Dashboard.Pages.Controle.Saida.' . $exploded[2]);
                            break;
                    }
                    break;
                case 'Estoque':
                    switch ($exploded[1]) {
                        case 'Categorias':
                            return view('Dashboard.Pages.Estoque.Categorias.' . $exploded[2]);
                            break;
                        case 'Materiais':
                            return view('Dashboard.Pages.Controle.Materiais.' . $exploded[2]);
                            break;
                    }
                    break;
                case 'Modulos':
                    switch ($exploded[1]) {
                        case 'Categorias':
                            return view('Dashboard.Pages.Modulos.Categorias.' . $exploded[2]);
                            break;
                        case 'Inicio':
                            return view('Dashboard.Pages.Modulos.Inicio');
                            break;
                    }
            }
        

        dd($pkey, $page);
    }
}
