<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\Interview;
use Illuminate\View\View;

class JobSeekerDashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        // Total applications
        $totalApplications = Application::where('applicant_id', $user->id)->count();

        // Applications in progress (screening, interview)
        $applicationsInProgress = Application::where('applicant_id', $user->id)
            ->whereIn('status', ['screening', 'interview'])
            ->count();

        // Total interviews
        $totalInterviews = Interview::whereHas('application', function ($query) {
            $query->where('applicant_id', auth()->id());
        })->count();

        // Interviews tomorrow
        $interviewsTomorrow = Interview::whereHas('application', function ($query) {
            $query->where('applicant_id', auth()->id());
        })->whereDate('scheduled_at', today()->addDay())->count();

        // Recent applications
        $recentApplications = Application::where('applicant_id', $user->id)
            ->with('job')
            ->latest('applied_at')
            ->take(5)
            ->get();

        // Recommended jobs (jobs not yet applied)
        $recommendedJobs = Job::where('status', 'active')
            ->whereNotIn('id', Application::where('applicant_id', $user->id)->pluck('job_id'))
            ->inRandomOrder()
            ->take(4)
            ->get();

        // Upcoming interviews
        $upcomingInterviews = Interview::whereHas('application', function ($query) {
            $query->where('applicant_id', auth()->id());
        })
            ->where('scheduled_at', '>=', now())
            ->orderBy('scheduled_at')
            ->take(5)
            ->get();

        return view('jobseeker.dashboard', [
            'totalApplications' => $totalApplications,
            'applicationsInProgress' => $applicationsInProgress,
            'totalInterviews' => $totalInterviews,
            'interviewsTomorrow' => $interviewsTomorrow,
            'recentApplications' => $recentApplications,
            'recommendedJobs' => $recommendedJobs,
            'upcomingInterviews' => $upcomingInterviews,
        ]);
    }
}
