<?php

namespace App\Http\Controllers\Pages\Estoque\Materiais;

use App\Http\Controllers\Controller;
use App\Models\Pages\Category;
use App\Models\Pages\Item;
use App\Models\Pages\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\History as ControllersHistory;

class Adicionar extends Controller
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
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('Dashboard.Pages.Estoque.Materiais.Adicionar', [
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
  
    public function Adicionar(Request $request){
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|min:2|max:255',
            'item_descricao' => 'required|min:2|max:255',
            'item_fabricante' => 'required|min:2|max:255',
            'item_Modelo' => 'required|min:2|max:255',
            'item_estado' => 'required|min:2|max:255',
            'item_codigo' => 'required|numeric',
            'item_quantidade' => 'required|numeric',
            'item_quantidade_min' => 'required|numeric',
            'item_quantidade_max' => 'required|numeric'
        ], [
            'item_name.required' => "O nome do material é necessario.",
            'item_name.min' => "O nome do material precisa conter no minimo 2 caracteres.",
            'item_name.max' => "O nome do material precisa conter no máximo 255 caracteres",
            'item_Modelo.required' => "O Modelo do material é necessario.",
            'item_Modelo.min' => "O Modelo do material precisa conter no minimo 2 caracteres.",
            'item_Modelo.max' => "O Modelo do material precisa conter no máximo 255 caracteres",
            'item_descricao.required' => "A descrição do material é necessario.",
            'item_descricao.min' => "A descrição do material precisa conter no minimo 2 caracteres",
            'item_descricao.max' => "A descrição do material precisa conter no máximo 255 caracteres",
            'item_estado.required' => "O estado do material é necessário",
            'item_estado.min' => "O estado do material precisa conter no minimo 2 caracteres",
            'item_estado.max' => "O estado do material precisa conter no máximo 255 caracteres",
            'item_quantidade_min.required' => "É necessario especificar o minimo de itens da categoria",
            'item_quantidade_min.numeric' => "É permitido somente a entrada de numeros para este campo",
            'item_quantidade_max.required' => "É necessário especificar o máximo de itens da categoria",
            'item_quantidade_max.numeric' => "É permitido somente a entrada de numeros para este campo"
        ]);
        $token = str_replace("/", ".", bcrypt($request['_token']));
        if ($validator->fails()) {
            return redirect()->route('estoque.materiais.add')
                ->withErrors($validator)
                ->withInput();
        }else {
            $valor = explode("_", $request->item_categoria);
            if(isset($valor[3])){
                Item::create([
                    'item_key' => str_replace("/", ".", bcrypt($request['_token'])),
                    'item_name' => $request->item_name,
                    'item_serialkey' => $request->item_codigo,
                    'item_quantidade' => $request->item_quantidade,
                    'item_min_quantidade' => $request->item_quantidade_min,
                    'item_max_quantidade' => $request->item_quantidade_max,
                    'item_fabricante' => $request->item_fabricante,
                    'item_modelo' => $request->item_Modelo,
                    'item_estado' => $request->item_estado,
                    'item_category' => $valor[1],
                    'item_subcategory' => $valor[3]
                ]);
            }else{
                Item::create([
                    'item_key' => $token,
                    'item_name' => $request->item_name,
                    'item_serialkey' => $request->item_codigo,
                    'item_quantidade' => $request->item_quantidade,
                    'item_min_quantidade' => $request->item_quantidade_min,
                    'item_max_quantidade' => $request->item_quantidade_max,
                    'item_fabricante' => $request->item_fabricante,
                    'item_modelo' => $request->item_Modelo,
                    'item_estado' => $request->item_estado,
                    'item_category' => $request->item_categoria
                ]);
            }
            $his = new ControllersHistory;
            $his->Hist($token, "Criou um novo material chamado ".$request->item_name);
            $request->session()->flash('status', "o Material foi criado com sucesso");
            return redirect()->route('estoque.materiais.add');
          
        }
    }
}
