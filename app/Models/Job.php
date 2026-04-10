<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

use App\Models\User;
use App\Models\Application;
use App\Models\Interview;

class Job extends Model
{
    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'location',
        'job_type',
        'employment_type',
        'salary',
        'salary_min',
        'salary_max',
        'status',
        'requirements',
        'benefits',
        'applicants_count',
        'posted_at'
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // ======================
    // RELATIONSHIPS
    // ======================

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function interviews(): HasManyThrough
    {
        return $this->hasManyThrough(
            Interview::class,
            Application::class,
            'job_id',          // FK sa applications
            'application_id',  // FK sa interviews
            'id',              // PK sa jobs
            'id'               // PK sa applications
        );
    }
}
