<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobSeekerBrowseController extends Controller
{
    public function index(): View
    {
        $jobs = Job::where('status', 'active')
            ->with('employer')
            ->latest('posted_at')
            ->paginate(10);

        // Get applied job IDs for current user
        $appliedJobIds = Application::where('applicant_id', auth()->id())->pluck('job_id')->toArray();

        return view('jobseeker.browse-jobs', [
            'jobs' => $jobs,
            'appliedJobIds' => $appliedJobIds,
        ]);
    }

    public function show(Job $job): View
    {
        $hasApplied = Application::where('job_id', $job->id)
            ->where('applicant_id', auth()->id())
            ->exists();

        $application = Application::where('job_id', $job->id)
            ->where('applicant_id', auth()->id())
            ->first();

        return view('jobseeker.job-detail', [
            'job' => $job,
            'hasApplied' => $hasApplied,
            'application' => $application,
        ]);
    }

    public function apply(Request $request, Job $job)
    {
        $hasApplied = Application::where('job_id', $job->id)
            ->where('applicant_id', auth()->id())
            ->exists();

        if ($hasApplied) {
            return back()->with('error', 'You have already applied to this job.');
        }

        Application::create([
            'job_id' => $job->id,
            'applicant_id' => auth()->id(),
            'status' => 'applied',
            'cover_letter' => $request->input('cover_letter'),
        ]);

        $job->increment('applicants_count');

        return back()->with('success', 'Application submitted successfully!');
    }
}
