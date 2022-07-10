<?php


namespace Campanha\Http\Controllers;


use App\Http\Controllers\Controller;
use Campanha\Models\BgCartaz;
use Campanha\Models\Campanha;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Http\Request;
//use \Bkwld\Cloner\Cloneable;



class ReguasIndividuaisController extends Controller
{

public  function reguaPromo(Request $request){
    $data = $request->all();
    $data = $request->all();
    $pdf = \PDF::loadView('campanha::admin.reguaindividual.reguaindividualpromo', compact('data'))
        ->setPaper('a4')
        ->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
    return $pdf->stream();
}

    public  function reguaApp(Request $request){
        $data = $request->all();
        $pdf = \PDF::loadView('campanha::admin.reguaindividual.reguaindividualapp', compact('data'))
            ->setPaper([0, 0, 595.27 ,841.88 ])
            ->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->stream();
    }


}

