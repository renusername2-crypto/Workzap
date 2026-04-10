<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function interviews(): HasMany
    {
        return $this->hasManyThrough(Interview::class, Application::class);
    }
}
