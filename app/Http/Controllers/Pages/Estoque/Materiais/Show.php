<?php

namespace App\Http\Controllers\Pages\Estoque\Materiais;

use App\Http\Controllers\Controller;
use App\Models\Pages\Category;
use App\Models\Pages\Item;
use App\Models\Pages\Subcategory;
use Illuminate\Http\Request;

class Show extends Controller
{
    private $title, $description, $title_page, $description_page, $icon, $button;

    public function __construct()
    {
        $this->title = "Materiais da Seção";
        $this->description = "Visualização dos materiais contidos na seção";
        $this->title_page = "Materiais da Seção";
        $this->description_page = "Tabela com materiais da seção";
        $this->icon = "pe-7s-magic-wand icon-gradient bg-mixed-hopes";
        $this->button = true;
    }

    public function index()
    {
        $category = Category::all();
        $subcategory = Subcategory::all();
        $item = Item::orderby('item_id', 'desc')->get();
        return view('Dashboard.Pages.Estoque.Materiais.Inicio', [
            'title' => $this->title,
            'description' => $this->description,
            'title_page' => $this->title_page,
            'description_page' => $this->description_page,
            'icon' => $this->icon,
            'button_return' => $this->button,
            'category' => $category,
            'subcategory' => $subcategory,
            'Itens' => $item
        ]);
    }
}
