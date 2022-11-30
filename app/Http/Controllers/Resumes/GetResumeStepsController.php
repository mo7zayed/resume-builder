<?php

namespace App\Http\Controllers\Resumes;

use App\Http\Controllers\Controller;
use App\Models\ResumeStep;
use Illuminate\Http\Request;

class GetResumeStepsController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'data' => ResumeStep::orderBy('order')->get()->map(fn ($step) => [
                'id' => $step->id,
                'name' => $step->name,
                'order' => $step->order,
            ]),
        ]);
    }
}
