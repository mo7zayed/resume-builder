<?php

namespace App\Http\Controllers\Resumes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetUserResumeController extends Controller
{
    public function __invoke(Request $request)
    {
        $resume = $request->user()->resume;

        $resume->load('stepsData.resumeStep');

        return response()->json([
            'data' => [
                'id' => $resume->id,
                'is_completed' => $resume->is_completed,
                'resume_last_step_id' => $resume->resume_last_step_id,
                'steps_data' => $resume->stepsData->map(function ($step) {
                    return [
                        'step_name' => $step->resumeStep->name,
                        'data' => $step->data,
                    ];
                }),
            ],
        ]);
    }
}
