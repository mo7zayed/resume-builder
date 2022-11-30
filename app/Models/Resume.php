<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'user_id',
        'resume_last_step_id',
        'is_completed',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lastStep()
    {
        return $this->hasOne(ResumeStep::class, 'id', 'resume_last_step_id');
    }

    public function stepsData()
    {
        return $this->hasMany(ResumeData::class);
    }

    public function lastStepData()
    {
        return $this->stepsData()->latest()->take(1);
    }

    public function canBeCompleted(): bool
    {
        $completedStepsIds = $this->stepsData()->get(['resume_step_id'])->pluck('resume_step_id')->sort()->toArray();
        $originalStepsIds = ResumeStep::get('id')->pluck('id')->sort()->toArray();

        return $completedStepsIds == $originalStepsIds;
    }

    public function markAsCompleted()
    {
        return $this->update([
            'is_completed' => true,
        ]);
    }
}
