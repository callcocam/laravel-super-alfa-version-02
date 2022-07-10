<?php

namespace App\Exports;

use App\Models\Produto;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ProdutosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $produtos = Produto::where('status', '!=', 'importadoerp')->get();
        return view('report.exports.produtos', [
            'produtos' => $produtos
        ]);
    }

}
