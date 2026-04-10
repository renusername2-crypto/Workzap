<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::where('status', 'active')->paginate(10);
        return view('jobseeker.jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('jobseeker.jobs.show', compact('job'));
    }
    public function apply(Job $job)
    {
        // This will never be null if route is properly protected
        $user = Auth::user();

        if ($job->applications()->where('applicant_id', $user->id)->exists()) {
            return back()->with('error', 'Already applied to this job.');
        }

        $job->applications()->create([
            'applicant_id' => $user->id,
            'status' => 'applied'
        ]);

        return redirect()->route('jobseeker.applications.index')->with('success', 'Application submitted!');
    }
}
