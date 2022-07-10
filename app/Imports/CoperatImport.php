<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class CoperatImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        return $rows;
    }
}