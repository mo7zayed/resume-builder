<?php

namespace App\Http\Controllers\Resumes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubmitResumeStepController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'step_id' => ['required', 'exists:resume_steps,id'],
            'data' => ['array'],
        ]);

        $resume = $request->user()->resume;

        $stepData = $resume->stepsData()->updateOrCreate([
            'resume_step_id' => $request->input('step_id'),
        ], [
            'data' => $request->input('data'),
        ]);

        if ($resume->canBeCompleted()) {
            $resume->markAsCompleted();
        }

        return response()->json([
            'data' => [
                'id' => $stepData->id,
                'resume_step_id' => $stepData->resume_step_id,
                'data' => $stepData->data,
            ],
        ], Response::HTTP_CREATED);
    }
}
