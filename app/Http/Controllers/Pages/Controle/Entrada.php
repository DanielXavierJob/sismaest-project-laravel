<?php

namespace App\Http\Controllers\Pages\Controle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Entrada extends Controller
{
    private $title, $description, $title_page, $description_page, $icon, $button;

    public function __construct()
    {
        $this->title = "Adicionar no Estoque";
        $this->description = "Adicionar material no estoque";
        $this->title_page = "Adicionar novo Material";
        $this->description_page = "Adicione um novo material no estoque";
        $this->icon = "pe-7s-magic-wand icon-gradient bg-mixed-hopes";
        $this->button = true;
    }

    public function index()
    {
        
        return view('Dashboard.Pages.Controle.Cautela', [
            'title' => $this->title,
            'description' => $this->description,
            'title_page' => $this->title_page,
            'description_page' => $this->description_page,
            'icon' => $this->icon,
            'button_return' => $this->button,
            
        ]);
    }
}
