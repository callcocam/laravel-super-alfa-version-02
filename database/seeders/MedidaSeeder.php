<?php

namespace Database\Seeders;

use App\Models\Medida;
use Illuminate\Database\Seeder;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Medida::query()->delete();
    }
}
