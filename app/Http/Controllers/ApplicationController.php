<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ApplicationController extends Controller
{
    public function index(): View
    {
        $applications = Application::whereHas('job', function ($query) {
            $query->where('employer_id', auth()->id());
        })
            ->with('applicant', 'job', 'interviews')
            ->latest()
            ->paginate(10);

        $statusCounts = [
            'all' => Application::whereHas('job', function ($query) {
                $query->where('employer_id', auth()->id());
            })->count(),
            'applied' => Application::whereHas('job', function ($query) {
                $query->where('employer_id', auth()->id());
            })->where('status', 'applied')->count(),
            'screening' => Application::whereHas('job', function ($query) {
                $query->where('employer_id', auth()->id());
            })->where('status', 'screening')->count(),
            'interview' => Application::whereHas('job', function ($query) {
                $query->where('employer_id', auth()->id());
            })->where('status', 'interview')->count(),
            'hired' => Application::whereHas('job', function ($query) {
                $query->where('employer_id', auth()->id());
            })->where('status', 'hired')->count(),
            'rejected' => Application::whereHas('job', function ($query) {
                $query->where('employer_id', auth()->id());
            })->where('status', 'rejected')->count(),
        ];

        return view('employer.applications.index', [
            'applications' => $applications,
            'statusCounts' => $statusCounts,
        ]);
    }

    public function update(Request $request, Application $application): RedirectResponse
    {
        $this->authorize('update', $application);

        $validated = $request->validate([
            'status' => 'required|string|in:applied,screening,interview,hired,rejected',
        ]);

        $application->update($validated);

        return redirect()->back()->with('success', 'Application status updated!');
    }
}
