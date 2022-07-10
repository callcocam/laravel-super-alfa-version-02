<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Imports;

use App\Models\Compra;
use Campanha\Models\FamiliaProduto;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\Importable;

class FamiliasImport implements ToArray
{
    use Importable;

    public function headingRow(): int
    {
        return 2;
    }

    public function array(array $rows)
    {
//        dd($rows);
        foreach ($rows as $row){
//            dd($row);
            if($compra = Compra::query()->where('codigo_interno', $row[0])->first()){

                if(!FamiliaProduto::query()->where('parent',$row[0])->first()){
                        $familiaproduto = FamiliaProduto::create([
                                'name' => $row[0],
                                'parent' => $row[0]
                        ]

                    );
                    dd($familiaproduto);
                }
//               dd($compra);
            }
        }
        return $rows;
    }
}
