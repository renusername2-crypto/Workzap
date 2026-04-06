<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;

class ApplicationPolicy
{
    public function update(User $user, Application $application): bool
    {
        return $user->id === $application->job->employer_id;
    }

    public function view(User $user, Application $application): bool
    {
        return $user->id === $application->job->employer_id || $user->id === $application->applicant_id;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }
}
