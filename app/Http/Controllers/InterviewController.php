<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::whereHas('application.job', function ($query) {
            $query->where('employer_id', Auth::id());
        })->with('application.job', 'application.jobseeker')->get();

        return view('employer.interviews.index', ['interviews' => $interviews]);
    }

    public function create()
    {
        $applications = Application::whereHas('job', function ($query) {
            $query->where('employer_id', Auth::id());
        })->with('jobseeker', 'job')->get();

        return view('employer.interviews.create', ['applications' => $applications]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'application_id' => 'required|exists:applications,id',
            'scheduled_at' => 'required|date|after:now',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        Interview::create($validated);

        return redirect()->route('employer.interviews.index')->with('success', 'Interview scheduled!');
    }

    public function edit(Interview $interview)
    {
        $this->authorize('update', $interview);
        return view('employer.interviews.edit', ['interview' => $interview]);
    }

    public function update(Request $request, Interview $interview)
    {
        $this->authorize('update', $interview);

        $validated = $request->validate([
            'scheduled_at' => 'required|date|after:now',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $interview->update($validated);

        return redirect()->route('employer.interviews.index')->with('success', 'Interview updated!');
    }

    public function cancel(Interview $interview)
    {
        $this->authorize('delete', $interview);
        $interview->delete();
        return redirect()->route('employer.interviews.index')->with('success', 'Interview cancelled!');
    }
}
