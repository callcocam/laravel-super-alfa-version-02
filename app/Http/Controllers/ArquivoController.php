<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class ArquivoController extends Controller
{

    public function store(Produto $model){

        //return view('report.produtos.cadastros')->with('produto',$model);
        /**
         * @var  $pdf \Barryvdh\DomPDF\PDF
         */
        //\PDF::setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif']);

        //dd($model, $model->embalagem,$model->compra,$model->marketing,$model->user);
        $pdf = \PDF::loadHTML(view('report.produtos.cadastros')->with('produto',$model)->render());
        $pdf->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);
        return $pdf->stream();
    }
}
