<?php

namespace App\Http\Controllers\Pages\Estoque\Categorias;

use App\Http\Controllers\Controller;
use App\Http\Controllers\History as ControllersHistory;
use App\Models\Config\History;
use App\Models\Pages\Category;
use App\Models\Pages\Subcategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Adicionar extends Controller
{
    private $title, $description, $title_page, $description_page, $icon, $button;

    public function __construct()
    {
        $this->title = "Adicionar no Estoque";
        $this->description = "Adicionar Categoria no estoque";
        $this->title_page = "Adicionar nova Categoria";
        $this->description_page = "Adicione uma nova categoria no estoque";
        $this->icon = "pe-7s-magic-wand icon-gradient bg-mixed-hopes";
        $this->button = true;
    }

    public function index()
    {
        return view('Dashboard.Pages.Estoque.Categorias.Adicionar', [
            'title' => $this->title,
            'description' => $this->description,
            'title_page' => $this->title_page,
            'description_page' => $this->description_page,
            'icon' => $this->icon,
            'button_return' => $this->button
        ]);
    }
    public function Adicionar(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'category_name' => 'required|min:2|max:255',
            'category_desc' => 'required|min:2|max:255',
            'category_estado' => 'required|min:2|max:255',
            'min_item_category' => 'required|numeric',
            'max_item_category' => 'required|numeric'
        ], [
            'category_name.required' => "O nome da categoria é necessaria.",
            'category_name.min' => "O nome da categoria precisa conter no minimo 2 caracteres.",
            'category_name.max' => "O nome da categoria precisa conter no máximo 255 caracteres",
            'category_desc.required' => "A descrição da categoria é necessaria.",
            'category_desc.min' => "A descrição da categoria precisa conter no minimo 2 caracteres",
            'category_desc.max' => "A descrição da categoria precisa conter no máximo 255 caracteres",
            'category_estado.required' => "O estado da categoria é necessário",
            'category_estado.min' => "O estado da categoria precisa conter no minimo 2 caracteres",
            'category_estado.max' => "O estado da categoria precisa conter no máximo 255 caracteres",
            'min_item_category.required' => "É necessario especificar o minimo de itens da categoria",
            'min_item_category.numeric' => "É permitido somente a entrada de numeros para este campo",
            'max_item_category.required' => "É necessário especificar o máximo de itens da categoria",
            'max-item_category.numeric' => "É permitido somente a entrada de numeros para este campo"
        ]);
        if ($validator->fails()) {
            return redirect()->route('estoque.categorias.add')
                ->withErrors($validator)
                ->withInput();
        } else {
            try {
                $category = Category::all();
                $token = str_replace("/", ".", bcrypt($request['_token']));
                
                $category_name = $request->category_name;
                $category_desc = $request->category_desc;
                $category_estado = $request->category_estado;
                $min_item_category = $request->min_item_category;
                $max_item_category = $request->max_item_category;
                $exists_subcategory = $request->exists_subcategory;

                $cat = Category::create([
                    'category_key' => $token,
                    'category_name' => $category_name,
                    'category_description' => $category_desc,
                    'category_estado' => $category_estado,
                    'category_min_item' => $min_item_category,
                    'category_max_item' => $max_item_category,
                    'category_exists_subcategory' => $exists_subcategory
                ]);
                if ($exists_subcategory) {

                    foreach ($request->all() as $teste => $key) {
                        $var = explode('_', $teste);

                        if (str_contains($var[0], 'sbc')) {
                            if (count($var) > 2) {
                                $i = 1;
                                $name = "";
                                $namesimplied = "";
                                while ($i < count($var)) {
                                    if ($i == count($var) - 1) {
                                        $name .= $var[$i];
                                        $namesimplied .= $var[$i];
                                    } else {
                                        $name .= $var[$i] . "_";
                                        $namesimplied .= $var[$i] . " ";
                                    }

                                    $i++;
                                }

                                if ($request['subcategory_desc_' . $name] == null) {
                                    dd($request['subcategory_desc_' . $name], $request->all(), $name, count($var));
                                } else {
                                    Subcategory::create([
                                        'sbc_key' => $token,
                                        'sbc_name' => $namesimplied,
                                        'sbc_description' => $request['subcategory_desc_' . $name],
                                        'sbc_min_item' => $request['subcategory_minitem_' . $name],
                                        'sbc_max_item' => $request['subcategory_maxitem_' . $name],
                                        'sbc_notification' => $request['notifications_sbc_' . $name]
                                    ]);
                                }
                            } else {
                                if ($request['subcategory_desc_' . $var[1]] == null) {
                                    dd($request['subcategory_desc_' . $var[1]]);
                                } else {
                                    Subcategory::create([
                                        'sbc_key' => $token,
                                        'sbc_name' => $var[1],
                                        'sbc_description' => $request['subcategory_desc_' . $var[1]],
                                        'sbc_min_item' => $request['subcategory_minitem_' . $var[1]],
                                        'sbc_max_item' => $request['subcategory_maxitem_' . $var[1]],
                                        'sbc_notification' => $request['notifications_sbc_' . $var[1]]
                                    ]);
                                }
                            }



                            // $collet = array();
                            // $collet[$var[1]] = array(
                            //     'subcategory_name' => $request['subcategory_name'.$var[1]],
                            //     'subcategory_desc' => $request['subcategory_desc'.$var[1]],
                            //     'notifications_sbc_' => $request['notifications_sbc_'.$var[1]],
                            //     'subcategory_minitem_' => $request['subcategory_minitem_'.$var[1]],
                            //     'subcategory_maxitem_' => $request['subcategory_maxitem_'.$var[1]], 
                            // );
                        }
                    }
                }
                $his = new ControllersHistory;
                $his->Hist($token, "Criou uma nova categoria chamada ".$category_name);
                $request->session()->flash('status', "A categoria foi criada com sucesso");
                return redirect()->route('estoque.categorias.add');
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }



        dd($request->all());
    }

    private function ValidateFields($field)
    {
    }
}
