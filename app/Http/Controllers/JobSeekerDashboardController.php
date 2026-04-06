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

        $totalApplications = Application::where('applicant_id', $user->id)->count();
        $applicationsInProgress = Application::where('applicant_id', $user->id)
            ->whereIn('status', ['screening', 'interview'])
            ->count();
        $totalInterviews = Interview::whereHas('application', function ($query) {
            $query->where('applicant_id', auth()->id());
        })->count();
        $interviewsTomorrow = Interview::whereHas('application', function ($query) {
            $query->where('applicant_id', auth()->id());
        })->whereDate('scheduled_at', today()->addDay())->count();

        $recentApplications = Application::where('applicant_id', $user->id)
            ->with('job')
            ->latest('applied_at')
            ->take(5)
            ->get();

        $recommendedJobs = Job::where('status', 'active')
            ->whereNotIn('id', Application::where('applicant_id', $user->id)->pluck('job_id'))
            ->inRandomOrder()
            ->take(4)
            ->get();

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
