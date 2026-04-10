<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with('job')
            ->where('applicant_id', Auth::id())
            ->paginate(10);
        return view('jobseeker.applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        $this->authorize('view', $application);
        return view('jobseeker.applications.show', compact('application'));
    }

    public function withdraw(Application $application)
    {
        $this->authorize('delete', $application);
        $application->delete();
        return redirect()->route('jobseeker.applications.index')->with('success', 'Application withdrawn.');
    }
}
