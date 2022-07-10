<?php

namespace App\Observers;

use App\Models\TempLog;
use App\Jobs\ProcessLog;

class TempLogObserver
{
    /**
     * Handle the TempLog "created" event.
     *
     * @param  \App\Models\TempLog  $tempLog
     * @return void
     */
    public function created(TempLog $tempLog)
    {
        ProcessLog::dispatch($tempLog);
     
    }

    /**
     * Handle the TempLog "updated" event.
     *
     * @param  \App\Models\TempLog  $tempLog
     * @return void
     */
    public function updated(TempLog $tempLog)
    {
        //
    }

    /**
     * Handle the TempLog "deleted" event.
     *
     * @param  \App\Models\TempLog  $tempLog
     * @return void
     */
    public function deleted(TempLog $tempLog)
    {
        //
    }

    /**
     * Handle the TempLog "restored" event.
     *
     * @param  \App\Models\TempLog  $tempLog
     * @return void
     */
    public function restored(TempLog $tempLog)
    {
        //
    }

    /**
     * Handle the TempLog "force deleted" event.
     *
     * @param  \App\Models\TempLog  $tempLog
     * @return void
     */
    public function forceDeleted(TempLog $tempLog)
    {
        //
    }
}
