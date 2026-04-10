<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerBrowseController extends Controller
{
    public function index()
    {
        $jobs = Job::where('status', 'published')->paginate(12);
        return view('jobseeker.browse-jobs', ['jobs' => $jobs]);
    }

    public function show(Job $job)
    {
        return view('jobseeker.job-detail', ['job' => $job]);
    }

    public function apply(Request $request, Job $job)
    {
        $existingApplication = Application::where('job_id', $job->id)
            ->where('applicant_id', Auth::id())
            ->first();

        if ($existingApplication) {
            return redirect()->back()->withErrors('You have already applied for this job!');
        }

        Application::create([
            'job_id' => $job->id,
            'applicant_id' => Auth::id(),
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
}
