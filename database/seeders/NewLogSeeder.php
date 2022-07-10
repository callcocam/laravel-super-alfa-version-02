<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if($templogs = \SIGA\Models\Log::all()){

            foreach ($templogs as $key => $templog) {
                \App\Models\NewLog::create([
                    "name" => $templog->name,
                    "user_id" => $templog->user_id,
                    "description" => $templog->description,
                    "status" => $templog->status,
                    "parent" => $templog->logable_id,
                    "created_at" => $templog->created_at,
                    "updated_at" => $templog->updated_at,
                   ]);
            }
        }
    }
}
