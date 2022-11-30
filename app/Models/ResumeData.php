<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeData extends Model
{
    protected $fillable = [
        'resume_id',
        'resume_step_id',
        'data',
    ];

    protected $casts = [
        'data' => 'json',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function resumeStep()
    {
        return $this->belongsTo(ResumeStep::class);
    }
}
