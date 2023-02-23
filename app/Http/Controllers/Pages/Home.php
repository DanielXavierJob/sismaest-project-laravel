<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Pages\Other\Buttons;
use App\Models\Config\History;
use App\Models\Pages\Category;
use App\Models\Pages\Item;
use App\Models\Pages\Notify;
use App\Models\Pages\Subcategory;

class Home extends Controller
{
    private $title, $description, $title_page, $description_page, $icon, $button;
    public function __construct()
    {
        $this->title = "Inicio";
        $this->description = "Estartisticas sobre modulos e configurações do SISMAEST";
        $this->title_page = "Pagina Inicial";
        $this->description_page = "Informações sobre a utilização do painel por esta seção";
        $this->icon = "pe-7s-monitor icon-gradient bg-mean-fruit";
        $this->button = false;
    }
    function index()
    {
        $category = Category::all();
        $subcategory = Subcategory::all();
        $itens = Item::All();
        $history = History::OrderBy('his_id', 'Desc')->get();
        $notify = Notify::OrderBy('noty_id', 'Desc')->limit(5)->get();
        return view('Dashboard.Pages.Inicio', [
            'title' => $this->title,
            'description' => $this->description,
            'title_page' => $this->title_page,
            'description_page' => $this->description_page,
            'icon' => $this->icon,
            'category' => $category,
            'subcategory' => $subcategory,
            'itens' => $itens,
            'history' => $history,
            'ntf' => $notify,
            'button_return' => $this->button
         ]);
    }
}
