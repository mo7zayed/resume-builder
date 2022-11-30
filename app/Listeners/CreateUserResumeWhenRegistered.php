<?php

namespace App\Listeners;

use App\Models\ResumeStep;

class CreateUserResumeWhenRegistered
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        $user->resume()->create([
            'resume_last_step_id' => ResumeStep::orderBy('order')->first()->getKey(),
        ]);
    }
}
