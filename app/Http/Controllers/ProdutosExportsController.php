<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosExportsController extends Controller
{
    public function export(Request $request)
    {
    $data = \App\Models\Produto::query()
    ->where('coperat_id',$request->query('coperat', '4E28B61F-E730-436B-8B4D-CAF0D11BD20C'))
    ->where('status',['concluido', 'compras-concluido'])->get();
    $produtos = [];
       foreach ($data as $prod){
           $produtos[]= [
               'desc_erp' => $prod->marketing->descricao_para_erp,
               'codigo_interno' => $prod->compra->codigo_interno,
               'cod_barras' => $prod->cod_barras,
               'altura_da_und' => $prod->altura_da_und,
               'largura_da_und' => $prod->largura_da_und,
               'profundidade_da_und' => $prod->profundidade_da_und,
               'medida_name' => $prod->medida_name,
           ];
       }
//      dd($produtos);
        return \Excel::download(new \App\Exports\ProdutosConcluidoExport(collect($produtos)), 'produtos-concluidos.xlsx');
    }
}


//$data = \App\Models\Produto::query()->select([
//    'codigo_interno', 'cod_barras','altura_da_und','largura_da_und','profundidade_da_und','medida_name'
//])
