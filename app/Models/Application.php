<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    protected $fillable = [
        'job_id',
        'applicant_id',
        'status',
        'cover_letter',
        'resume_path',
        'applied_at'
    ];

    protected $casts = [
        'applied_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function jobseeker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function interviews(): HasMany
    {
        return $this->hasMany(Interview::class);
    }
}
