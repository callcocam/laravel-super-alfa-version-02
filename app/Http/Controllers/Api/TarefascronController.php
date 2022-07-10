<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Campanha\Models\Campanha;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TarefascronController extends Controller
{
   public function excluirlaminasantigas(){
       $campanhas = Campanha::query()->where('type', 'lamina')->whereDate('data_fim', '<', Carbon::yesterday())->get();
       if($campanhas){
           foreach ($campanhas as $campanha){
               $campanha->delete();
           }
       }
//       return json_encode($campanhas);
   }
}
