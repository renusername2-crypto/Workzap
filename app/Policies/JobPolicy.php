<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

class JobPolicy
{
    public function update(User $user, Job $job): bool
    {
        return $user->id === $job->employer_id;
    }

    public function delete(User $user, Job $job): bool
    {
        return $user->id === $job->employer_id;
    }

    public function create(User $user): bool
    {
        return $user->isEmployer();
    }
}
