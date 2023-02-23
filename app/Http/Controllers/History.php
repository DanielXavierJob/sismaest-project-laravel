<?php

namespace App\Http\Controllers;

use App\Models\Config\History as ConfigHistory;
use Illuminate\Http\Request;

class History extends Controller
{
   public function Hist($_token, $dec){
       ConfigHistory::create([
           'his_key' => bcrypt($_token),
           'his_dec' => $dec,
           'his_user' => ""
       ]);
   }
}
