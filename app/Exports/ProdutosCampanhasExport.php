<?php


namespace App\Exports;


use Campanha\Models\Campanha;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProdutosCampanhasExport implements FromView, ShouldAutoSize
{
   protected $id;
   public $campanha;
public function __construct($id)
{
    $this->id = $id;

}

    public function view(): View
    {

        return view('report.exports.produtoscampanhas', [
            'produtos' => ProdutosCampanha::query()->where('campanha_id', $this->id)->where('status', 'published') ->orderBy('coperat_id')->get(),
            'campanha' => Campanha::query()->where('id', $this->id)->first()

        ]);
    }
}
