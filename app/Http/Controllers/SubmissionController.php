<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Jobs\ProcessSubmission;
use Illuminate\Support\Facades\Log;

class SubmissionController extends Controller
{
    public function submit(SubmissionRequest $request)
    {
        try {
            $validatedRequest = $request->validated();
            // Dispatch the job to the queue
            ProcessSubmission::dispatch($validatedRequest);

            // Log successful submission for debugging purposes
            Log::info('Submission received and job dispatched', $validatedRequest);

            return response()->json(['status' => 'Submission received and processing'], 202);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error processing submission', ['error' => $e->getMessage()]);

            // Return error response
            return response()->json(['status' => 'Error processing submission', 'error' => $e->getMessage()], 500);
        }
    }
}
