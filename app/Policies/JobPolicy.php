<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

class JobPolicy
{
    public function create(User $user): bool
    {
        return $user->isEmployer();
    }

    public function update(User $user, Job $job): bool
    {
        return $user->id === $job->employer_id;
    }

    public function delete(User $user, Job $job): bool
    {
        return $user->id === $job->employer_id;
    }

    public function view(User $user, Job $job): bool
    {
        return true;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }
}
