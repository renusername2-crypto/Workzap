<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Data for dashboard
        $data = [
            'jobPostings' => 6,
            'activeJobs' => 4,
            'totalApplicants' => 34,
            'newApplicants' => 5,
            'interviewsToday' => 3,
            'pendingInterviews' => 1,
        ];

        return view('employer.dashboard', $data);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('employer.profile', ['user' => $user]);
    }
}
