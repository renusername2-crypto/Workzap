<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerDashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobSeekerDashboardController;
use App\Http\Controllers\JobSeekerBrowseController;
use App\Http\Controllers\JobSeekerApplicationController;
use App\Http\Controllers\JobSeekerInterviewController;

// --- Guest Routes ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// --- Admin Login Routes ---
Route::get('/admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login.post');

// --- Authenticated User Routes ---
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// --- Authenticated Admin Routes ---
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// --- Employer Dashboard Routes ---
Route::middleware(['auth'])->prefix('employer')->group(function () {
    // Employer Dashboard
    Route::get('/dashboard', [EmployerDashboardController::class, 'index'])->name('employer.dashboard');

    // Jobs
    Route::get('/jobs', [JobController::class, 'index'])->name('employer.jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('employer.jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('employer.jobs.store');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('employer.jobs.show');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('employer.jobs.edit');
    Route::put('/jobs/{job}', [JobController::class, 'update'])->name('employer.jobs.update');
    Route::post('/jobs/{job}/publish', [JobController::class, 'publish'])->name('employer.jobs.publish');
    Route::post('/jobs/{job}/close', [JobController::class, 'close'])->name('employer.jobs.close');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('employer.jobs.destroy');

    // Applications
    Route::get('/applications', [ApplicationController::class, 'index'])->name('employer.applications.index');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('employer.applications.show');
    Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('employer.applications.update');

    // Interviews
    Route::get('/interviews', [InterviewController::class, 'index'])->name('employer.interviews.index');
    Route::get('/interviews/create', [InterviewController::class, 'create'])->name('employer.interviews.create');
    Route::post('/interviews', [InterviewController::class, 'store'])->name('employer.interviews.store');
    Route::get('/interviews/{interview}/edit', [InterviewController::class, 'edit'])->name('employer.interviews.edit');
    Route::put('/interviews/{interview}', [InterviewController::class, 'update'])->name('employer.interviews.update');
    Route::post('/interviews/{interview}/cancel', [InterviewController::class, 'cancel'])->name('employer.interviews.cancel');

    // Profile
    Route::get('/profile', [EmployerDashboardController::class, 'profile'])->name('employer.profile');
});

// --- Job Seeker Routes ---
Route::middleware(['auth'])->prefix('jobseeker')->group(function () {
    // Job Seeker Dashboard
    Route::get('/dashboard', [JobSeekerDashboardController::class, 'index'])->name('jobseeker.dashboard');

    // Browse Jobs
    Route::get('/jobs', [JobSeekerBrowseController::class, 'index'])->name('jobseeker.browse-jobs');
    Route::get('/jobs/{job}', [JobSeekerBrowseController::class, 'show'])->name('jobseeker.job-detail');
    Route::post('/jobs/{job}/apply', [JobSeekerBrowseController::class, 'apply'])->name('jobseeker.apply');

    // My Applications
    Route::get('/applications', [JobSeekerApplicationController::class, 'index'])->name('jobseeker.applications');
    Route::get('/applications/{application}', [JobSeekerApplicationController::class, 'show'])->name('jobseeker.applications.show');
    Route::post('/applications/{application}/withdraw', [JobSeekerApplicationController::class, 'withdraw'])->name('jobseeker.applications.withdraw');

    // My Interviews
    Route::get('/interviews', [JobSeekerInterviewController::class, 'index'])->name('jobseeker.interviews');
    Route::post('/interviews/{interview}/accept', [JobSeekerInterviewController::class, 'accept'])->name('jobseeker.interviews.accept');
    Route::post('/interviews/{interview}/decline', [JobSeekerInterviewController::class, 'decline'])->name('jobseeker.interviews.decline');

    // Profile
    Route::get('/profile', [JobSeekerDashboardController::class, 'profile'])->name('jobseeker.profile');
});
