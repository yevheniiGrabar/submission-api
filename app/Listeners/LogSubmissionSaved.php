<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Support\Facades\Log;

class LogSubmissionSaved
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @param SubmissionSaved $event
     */
    public function handle(SubmissionSaved $event): void
    {
        Log::info('Submission saved:', ['name' => $event->submission->name, 'email' => $event->submission->email]);
    }
}
