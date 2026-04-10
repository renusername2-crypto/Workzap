<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

    public function employer(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'employer_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(\App\Models\Application::class);
    }

    public function interviews(): HasManyThrough
    {
        return $this->hasManyThrough(
            \App\Models\Interview::class,
            \App\Models\Application::class,
            'job_id',          // Foreign key on the applications table...
            'application_id',  // Foreign key on the interviews table...
            'id',              // Local key on the jobs table...
            'id'               // Local key on the applications table...
        );
    }
}
