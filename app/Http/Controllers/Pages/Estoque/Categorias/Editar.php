<?php

namespace App\Http\Controllers\Pages\Estoque\Categorias;

use App\Http\Controllers\Controller;
use App\Models\Pages\Category;
use App\Models\Pages\Subcategory;
use Illuminate\Http\Request;

class Editar extends Controller
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

    public function index($id)
    {
        $category = Category::where('category_key', $id)->first();
        $subcategory = Subcategory::where('sbc_key', $id)->get();
        return view('Dashboard.Pages.Estoque.Categorias.Editar', [
            'title' => $this->title,
            'description' => $this->description,
            'title_page' => $this->title_page,
            'description_page' => $this->description_page,
            'icon' => $this->icon,
            'button_return' => $this->button,
            'category' => $category,
            'subcategory' => $subcategory
        ]);
    }
   
}
