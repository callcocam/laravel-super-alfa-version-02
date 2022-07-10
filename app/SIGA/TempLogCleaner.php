<?php
namespace App\SIGA;

use App\Models\TempLog;

class TempLogCleaner
{
    
    public static function logs()
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
