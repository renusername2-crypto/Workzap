<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use App\Models\Interview;
use Illuminate\View\View;

class EmployerDashboardController extends Controller
{
    public function index(): View
    {
        $employer = auth()->user();

        $totalJobs = Job::where('employer_id', $employer->id)->count();
        $activeJobs = Job::where('employer_id', $employer->id)
            ->where('status', 'active')
            ->count();

        $totalApplicants = Application::whereHas('job', function ($query) {
            $query->where('employer_id', auth()->id());
        })->count();

        $applicantsToday = Application::whereHas('job', function ($query) {
            $query->where('employer_id', auth()->id());
        })->whereDate('applied_at', today())->count();

        $interviewsToday = Interview::whereHas('application', function ($query) {
            $query->whereHas('job', function ($jobQuery) {
                $jobQuery->where('employer_id', auth()->id());
            });
        })->whereDate('scheduled_at', today())->count();

        $pendingInterviews = Interview::whereHas('application', function ($query) {
            $query->whereHas('job', function ($jobQuery) {
                $jobQuery->where('employer_id', auth()->id());
            });
        })->where('status', 'pending')->count();

        $recentApplicants = Application::whereHas('job', function ($query) {
            $query->where('employer_id', auth()->id());
        })->with('applicant', 'job')
            ->latest('applied_at')
            ->take(5)
            ->get();

        $latestJobs = Job::where('employer_id', $employer->id)
            ->latest('created_at')
            ->take(5)
            ->get();

        return view('employer.dashboard', [
            'totalJobs' => $totalJobs,
            'activeJobs' => $activeJobs,
            'totalApplicants' => $totalApplicants,
            'applicantsToday' => $applicantsToday,
            'interviewsToday' => $interviewsToday,
            'pendingInterviews' => $pendingInterviews,
            'recentApplicants' => $recentApplicants,
            'latestJobs' => $latestJobs,
        ]);
    }
}
