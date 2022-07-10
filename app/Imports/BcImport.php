<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\Importable;

class BcImport implements ToArray
{
    use Importable;
    
    public function headingRow(): int
    {
        return 2;
    }

    public function array(array $rows)
    {
        return $rows;
    }
}
