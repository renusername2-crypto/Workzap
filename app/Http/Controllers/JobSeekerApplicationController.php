<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::where('applicant_id', Auth::id())
            ->with('job', 'job.employer')
            ->paginate(10);

        return view('jobseeker.applications', ['applications' => $applications]);
    }

    public function show(Application $application)
    {
        $this->authorize('view', $application);
        return view('jobseeker.applications.show', ['application' => $application]);
    }

    public function withdraw(Application $application)
    {
        $this->authorize('delete', $application);
        $application->delete();
        return redirect()->back()->with('success', 'Application withdrawn!');
    }
}
