<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\View\View;

class JobSeekerInterviewController extends Controller
{
    public function index(): View
    {
        $interviews = Interview::whereHas('application', function ($query) {
            $query->where('applicant_id', auth()->id());
        })
            ->with('application.job', 'application.applicant')
            ->latest('scheduled_at')
            ->paginate(10);

        $upcomingInterviews = Interview::whereHas('application', function ($query) {
            $query->where('applicant_id', auth()->id());
        })
            ->where('scheduled_at', '>=', now())
            ->orderBy('scheduled_at')
            ->take(5)
            ->get();

        return view('jobseeker.interviews', [
            'interviews' => $interviews,
            'upcomingInterviews' => $upcomingInterviews,
        ]);
    }
}
