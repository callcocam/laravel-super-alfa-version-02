<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Imports;

use App\Models\Compra;
use App\Models\Produto;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\Importable;

class MedidasImport implements ToArray
{
    use Importable;

    public function headingRow(): int
    {
        return 2;
    }

    public function array(array $rows)
    {
     
//         foreach ($rows as $row){

//             if($compra = Compra::query()->where('codigo_interno', $row[0])->first()){

//                 if(!FamiliaProduto::query()->where('parent',$row[0])->first()){
//                         $familiaproduto = FamiliaProduto::create([
//                                 'name' => $row[0],
//                                 'parent' => $row[0]
//                         ]

//                     );
//                     dd($familiaproduto);
//                 }
// //               dd($compra);
//             }
//         }
        return $rows;
    }
}
