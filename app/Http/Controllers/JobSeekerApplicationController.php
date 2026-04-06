<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\View\View;

class JobSeekerApplicationController extends Controller
{
    public function index(): View
    {
        $applications = Application::where('applicant_id', auth()->id())
            ->with('job', 'interviews')
            ->latest('applied_at')
            ->paginate(10);

        $statusCounts = [
            'all' => Application::where('applicant_id', auth()->id())->count(),
            'applied' => Application::where('applicant_id', auth()->id())->where('status', 'applied')->count(),
            'screening' => Application::where('applicant_id', auth()->id())->where('status', 'screening')->count(),
            'interview' => Application::where('applicant_id', auth()->id())->where('status', 'interview')->count(),
            'hired' => Application::where('applicant_id', auth()->id())->where('status', 'hired')->count(),
            'rejected' => Application::where('applicant_id', auth()->id())->where('status', 'rejected')->count(),
        ];

        return view('jobseeker.applications', [
            'applications' => $applications,
            'statusCounts' => $statusCounts,
        ]);
    }
}
