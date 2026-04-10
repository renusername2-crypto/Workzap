<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::whereHas('job', function ($query) {
            $query->where('employer_id', Auth::id());
        })->with('jobseeker', 'job')->orderBy('created_at', 'desc')->paginate(10);

        return view('employer.applications.index', ['applications' => $applications]);
    }

    public function show(Application $application)
    {
        $this->authorize('view', $application);
        return view('employer.applications.show', ['application' => $application]);
    }

    public function update(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        $validated = $request->validate([
            'status' => 'required|in:applied,screening,interview,hired,rejected',
        ]);

        $application->update($validated);

        return redirect()->back()->with('success', 'Application status updated!');
    }
}
