<?php

use Illuminate\Support\Facades\Route;

// ======================
// AUTH CONTROLLERS
// ======================
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// ======================
// EMPLOYER CONTROLLERS
// ======================
use App\Http\Controllers\EmployerDashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\InterviewController;

// ======================
// JOBSEEKER (NEW STRUCTURE)
// ======================
use App\Http\Controllers\Jobseeker\DashboardController as JD;
use App\Http\Controllers\Jobseeker\JobController as JJ;
use App\Http\Controllers\Jobseeker\ApplicationController as JA;
use App\Http\Controllers\Jobseeker\InterviewController as JI;

// ======================
// ADMIN (NEW STRUCTURE)
// ======================
use App\Http\Controllers\Admin\DashboardController as AD;
use App\Http\Controllers\Admin\UserController as AU;
use App\Http\Controllers\Admin\JobController as AJ;
use App\Http\Controllers\Admin\ApplicationController as AA;
use App\Http\Controllers\Admin\InterviewController as AI;


// ======================
// GUEST ROUTES
// ======================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});


// ======================
// ADMIN LOGIN
// ======================
Route::get('/admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login.post');


// ======================
// COMMON AUTH ROUTES
// ======================
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// ======================
// ADMIN ROUTES
// ======================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AD::class, 'index'])->name('dashboard');

        Route::resource('users', AU::class)->only(['index', 'show']);
        Route::resource('jobs', AJ::class)->only(['index', 'show']);
        Route::resource('applications', AA::class)->only(['index', 'show']);
        Route::resource('interviews', AI::class)->only(['index', 'show']);

        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });


// ======================
// EMPLOYER ROUTES
// ======================
Route::middleware(['auth', 'role:employer'])
    ->prefix('employer')
    ->name('employer.')
    ->group(function () {

        Route::get('/dashboard', [EmployerDashboardController::class, 'index'])->name('dashboard');

        Route::resource('jobs', JobController::class);
        Route::post('/jobs/{job}/publish', [JobController::class, 'publish'])->name('jobs.publish');
        Route::post('/jobs/{job}/close', [JobController::class, 'close'])->name('jobs.close');

        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
        Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');

        Route::resource('interviews', InterviewController::class)->except(['show', 'destroy']);
        Route::post('/interviews/{interview}/cancel', [InterviewController::class, 'cancel'])->name('interviews.cancel');

        Route::get('/profile', [EmployerDashboardController::class, 'profile'])->name('profile');
    });


// ======================
// JOBSEEKER ROUTES
// ======================
Route::middleware(['auth', 'role:jobseeker'])
    ->prefix('jobseeker')
    ->name('jobseeker.')
    ->group(function () {

        Route::get('/dashboard', [JD::class, 'index'])->name('dashboard');

        Route::get('/jobs', [JJ::class, 'index'])->name('jobs.index');
        Route::get('/jobs/{job}', [JJ::class, 'show'])->name('jobs.show');
        Route::post('/jobs/{job}/apply', [JJ::class, 'apply'])->name('jobs.apply');

        Route::get('/applications', [JA::class, 'index'])->name('applications.index');
        Route::get('/applications/{application}', [JA::class, 'show'])->name('applications.show');
        Route::delete('/applications/{application}', [JA::class, 'withdraw'])->name('applications.withdraw');

        Route::get('/interviews', [JI::class, 'index'])->name('interviews.index');
        Route::get('/interviews/{interview}', [JI::class, 'show'])->name('interviews.show');
        Route::post('/interviews/{interview}/accept', [JI::class, 'accept'])->name('interviews.accept');
        Route::post('/interviews/{interview}/decline', [JI::class, 'decline'])->name('interviews.decline');

        Route::get('/profile', [JD::class, 'profile'])->name('profile');
    });
