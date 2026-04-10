<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Data for dashboard
        $data = [
            'totalApplications' => 12,
            'pendingApplications' => 3,
            'interviewsScheduled' => 2,
            'upcomingInterviews' => 1,
            'savedJobs' => 8,
        ];

        return view('jobseeker.dashboard', $data);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('jobseeker.profile', ['user' => $user]);
    }
}
