<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
class ProdutosConcluidoExport implements FromCollection,WithHeadings
{

    protected $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            'Desc ERP',
            'Cod Interno',
            'Cod de barras',
            'Altura da unid',
            'Largura da unid',
            'Profundidade da unid',
            'Medida',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;

    }
}
