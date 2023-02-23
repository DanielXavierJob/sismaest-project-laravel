<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pages\Modulos\Categorias;
use Illuminate\Http\Request;

class Modulos extends Controller
{
    private $title, $description, $buttons, $icon;
    public function __construct()
    {
        $this->title = "Modulos";
        $this->description = "Informações sobre as configurações de Modulos do SISMAEST";
        $this->buttons = false;
        $this->icon = 0;
    }


    public function index($x){
        switch($x){
            case "Category":
                $this->Categorias();
                break;
        }
    }

    private function Authenticators(){
        
    }
    private function Inventory(){}
    private function Item(){}
    private function Motors(){}
    private function Pkey(){}
    private function Printer(){}
    private function Profile(){}
    private function Security(){}
    private function Storage(){}

    private function Categorias(){
       echo "ola";
    }
}
