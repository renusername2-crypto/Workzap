<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerDashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\InterviewController;

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
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// --- Authenticated Admin Routes ---
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// --- Employer Dashboard Routes ---
Route::middleware(['auth'])->group(function () {
    // Employer Dashboard
    Route::get('/employer/dashboard', [EmployerDashboardController::class, 'index'])->name('employer.dashboard');

    // Jobs
    Route::get('/employer/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/employer/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/employer/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/employer/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/employer/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    Route::post('/employer/jobs/{job}/publish', [JobController::class, 'publish'])->name('jobs.publish');
    Route::post('/employer/jobs/{job}/close', [JobController::class, 'close'])->name('jobs.close');
    Route::delete('/employer/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

    // Applications
    Route::get('/employer/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::put('/employer/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');

    // Interviews
    Route::get('/employer/interviews', [InterviewController::class, 'index'])->name('interviews.index');
    Route::post('/employer/interviews', [InterviewController::class, 'store'])->name('interviews.store');
    Route::put('/employer/interviews/{interview}', [InterviewController::class, 'update'])->name('interviews.update');
});
