<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\Application;
use App\Models\Interview;
use App\Policies\JobPolicy;
use App\Policies\ApplicationPolicy;
use App\Policies\InterviewPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Job::class => JobPolicy::class,
        Application::class => ApplicationPolicy::class,
        Interview::class => InterviewPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
