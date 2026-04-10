<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

use App\Models\Job;
use App\Models\Application;
use App\Models\Interview;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ======================
    // RELATIONSHIPS
    // ======================

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'employer_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'applicant_id');
    }

    public function interviews(): HasManyThrough
    {
        return $this->hasManyThrough(
            Interview::class,
            Application::class,
            'applicant_id',     // FK sa applications table
            'application_id',   // FK sa interviews table
            'id',               // local key sa users
            'id'                // local key sa applications
        );
    }

    // ======================
    // ROLE HELPERS
    // ======================

    public function isEmployer(): bool
    {
        return $this->role === 'employer';
    }

    public function isJobSeeker(): bool
    {
        return $this->role === 'jobseeker';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // ======================
    // ACCESSORS
    // ======================

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // database/migrations/xxxx_xx_xx_add_role_to_users_table.php
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('jobseeker')->after('password');
        });
    }
}
