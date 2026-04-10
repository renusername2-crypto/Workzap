<?php

namespace App\Policies;

use App\Models\Interview;
use App\Models\User;

class InterviewPolicy
{
    public function update(User $user, Interview $interview): bool
    {
        return $user->id === $interview->application->job->employer_id || $user->id === $interview->application->applicant_id;
    }

    public function delete(User $user, Interview $interview): bool
    {
        return $user->id === $interview->application->job->employer_id;
    }
}
