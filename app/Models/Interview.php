<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;

class Interview extends Model
{
    protected $fillable = [
        'application_id',
        'scheduled_at',
        'location',
        'status',
        'notes'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // ======================
    // RELATIONSHIPS
    // ======================

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    // Job via Application
    public function job(): HasOneThrough
    {
        return $this->hasOneThrough(
            Job::class,
            Application::class,
            'id',          // PK sa applications
            'id',          // PK sa jobs
            'application_id', // FK sa interviews
            'job_id'       // FK sa applications
        );
    }

    // Jobseeker via Application
    public function applicant(): HasOneThrough
    {
        return $this->hasOneThrough(
            User::class,
            Application::class,
            'id',
            'id',
            'application_id',
            'applicant_id'
        );
    }
}
