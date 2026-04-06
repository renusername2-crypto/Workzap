<?php

namespace App\Policies;

use App\Models\Interview;
use App\Models\User;

class InterviewPolicy
{
    public function create(User $user): bool
    {
        return $user->isEmployer();
    }

    public function update(User $user, Interview $interview): bool
    {
        return $user->id === $interview->application->job->employer_id;
    }

    public function view(User $user, Interview $interview): bool
    {
        return $user->id === $interview->application->job->employer_id || $user->id === $interview->application->applicant_id;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }
}
