<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TempLog;

class TempLogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:temp-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Roda os commandos para gerar os logs';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if($templogs = TempLog::all()){

            foreach ($templogs as $key => $templog) {
                \SIGA\Models\Log::create([
                    "name" => $templog->name,
                    "user_id" => $templog->user_id,
                    "description" => $templog->description,
                    "status" => $templog->status,
                    "logable_id" => $templog->templogable_id,
                    "logable_type" => $templog->templogable_type,
                    "created_at" => $templog->created_at,
                    "updated_at" => $templog->updated_at,
                   ]);
                   $templog->delete();
            }
        }
        
    }
}
