<?php

namespace App\Http\Controllers\Resumes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetUserResumeLastStepDataController extends Controller
{
    public function __invoke(Request $request)
    {
        $stepData = $request->user()->resume->lastStepData()->first();

        return response()->json([
            'data' => $stepData ? [
                'id' => $stepData->id,
                'resume_step_id' => $stepData->resume_step_id,
                'data' => $stepData->data,
            ] : null,
        ]);
    }
}
