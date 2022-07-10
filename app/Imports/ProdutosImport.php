<?php

namespace App\Imports;

use App\Models\Import\Compra;
use App\Models\Import\Marketing;
use App\Models\Import\Produto;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProdutosImport implements
    ToCollection,
    WithHeadingRow,
    SkipsOnError,
    SkipsOnFailure,
    WithEvents
{
    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners;


    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $uuid = Str::uuid()->toString();
            Produto::create([
                'id' => $uuid,
                'slug' => Str::slug($row['desc']),
                'descricao_completa' => $row['desc'],
                'cod_barras' => $row['codbarras'],
                'cod_prod_fornecedor' => $row['codbarras'],
                'coperat_name' => $row['coperat'],
                'status' => 'importadoerp',
                'user_id' => '5ad24e70-c8e6-4844-97e1-60a67d9befe8'
            ]);

            Compra::create([
                'id' => Str::uuid()->toString(),
                'produto_id' => $uuid,
                'codigo_interno' => $row['codinterno'],
                'status' => 'importadoerp',
                'user_id' => '5ad24e70-c8e6-4844-97e1-60a67d9befe8'
            ]);
            Marketing::create([
                'id' => Str::uuid()->toString(),
                'produto_id' => $uuid,
                'descricao_comercial' => $row['desc'],
                'descricao_para_erp' => $row['desc'],
                'descricao_para_encarte' => $row['desccartaz'],
                'status' => 'importadoerp',
                'user_id' => '5ad24e70-c8e6-4844-97e1-60a67d9befe8'
            ]);

        }
    }

}


