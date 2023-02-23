<?php

namespace App\Http\Controllers\Pages\Estoque\Categorias;

use App\Http\Controllers\Controller;
use App\Models\Pages\Category;
use App\Models\Pages\Subcategory;
use Illuminate\Http\Request;

class Show extends Controller
{ 
    private $title, $description, $title_page, $description_page, $icon, $button;

    public function __construct()
    {
        $this->title = "Visualizar Categorias";
        $this->description = "Visualizar Categorias no estoque";
        $this->title_page = "Visualizar Categorias";
        $this->description_page = "Visualizar Categorias no estoque";
        $this->icon = "pe-7s-magic-wand icon-gradient bg-mixed-hopes";
        $this->button = true;
    }

    public function index()
    {
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('Dashboard.Pages.Estoque.Categorias.Inicio', [
            'title' => $this->title,
            'description' => $this->description,
            'title_page' => $this->title_page,
            'description_page' => $this->description_page,
            'icon' => $this->icon,
            'category' => $category,
            'subcategory' => $subcategory,
            'button_return' => $this->button
        ]);
    }
   
}
