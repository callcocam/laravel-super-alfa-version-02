<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\TempLog;

class ProcessLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   
    private $tempLog;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(TempLog $tempLog)
    {
        $this->tempLog = $tempLog;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \SIGA\Models\Log::create([
            "name" => $this->tempLog->name,
            "user_id" => $this->tempLog->user_id,
            "description" => $this->tempLog->description,
            "status" => $this->tempLog->status,
            "logable_id" => $this->tempLog->templogable_id,
            "logable_type" => $this->tempLog->templogable_type,
            "created_at" => $this->tempLog->created_at,
            "updated_at" => $this->tempLog->updated_at,
           ]);
           $this->tempLog->delete();
    }
}
