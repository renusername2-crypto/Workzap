<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class InterviewController extends Controller
{
    public function index(): View
    {
        $interviews = Interview::whereHas('application', function ($query) {
            $query->whereHas('job', function ($jobQuery) {
                $jobQuery->where('employer_id', auth()->id());
            });
        })
            ->with('application.applicant', 'application.job')
            ->latest('scheduled_at')
            ->paginate(10);

        $upcomingInterviews = Interview::whereHas('application', function ($query) {
            $query->whereHas('job', function ($jobQuery) {
                $jobQuery->where('employer_id', auth()->id());
            });
        })
            ->where('scheduled_at', '>=', now())
            ->orderBy('scheduled_at')
            ->take(5)
            ->get();

        return view('employer.interviews.index', [
            'interviews' => $interviews,
            'upcomingInterviews' => $upcomingInterviews,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'application_id' => 'required|exists:applications,id',
            'scheduled_at' => 'required|date|after:now',
        ]);

        $application = Application::findOrFail($validated['application_id']);

        $this->authorize('create-interview', $application);

        Interview::create($validated);

        $application->update(['status' => 'interview']);

        return redirect()->back()->with('success', 'Interview scheduled successfully!');
    }

    public function update(Request $request, Interview $interview): RedirectResponse
    {
        $this->authorize('update', $interview);

        $validated = $request->validate([
            'status' => 'required|string|in:pending,confirmed,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        $interview->update($validated);

        return redirect()->back()->with('success', 'Interview updated!');
    }
}
