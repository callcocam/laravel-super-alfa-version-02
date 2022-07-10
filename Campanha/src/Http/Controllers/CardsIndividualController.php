<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Campanha\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Midia;
use Campanha\Models\CardIndividual;
use Illuminate\Http\Request;

class CardsIndividualController extends Controller
{


    public function generate(CardIndividual $model){
        //        return response()->json($model->toArray());
        $midias_config = Midia::first();
        $produto = $model;
        return view('campanha::admin.cards.individual.generate', compact('produto', 'midias_config'));
    }

}

