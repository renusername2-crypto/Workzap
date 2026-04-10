<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::where('employer_id', Auth::id())->paginate(10);
        return view('employer.jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('employer.jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,contract,temporary',
            'location' => 'required|string|max:255',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'nullable|string',
        ]);

        $validated['employer_id'] = Auth::id();
        $validated['status'] = 'draft';
        $validated['job_type'] = $validated['employment_type'];

        Job::create($validated);

        return redirect()->route('employer.jobs.index')->with('success', 'Job posting created successfully!');
    }

    public function show(Job $job)
    {
        $this->authorize('view', $job);
        return view('employer.jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        $this->authorize('update', $job);
        return view('employer.jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        $this->authorize('update', $job);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,contract,temporary',
            'location' => 'required|string|max:255',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'nullable|string',
        ]);

        $validated['job_type'] = $validated['employment_type'];
        $job->update($validated);

        return redirect()->route('employer.jobs.index')->with('success', 'Job posting updated successfully!');
    }

    public function publish(Job $job)
    {
        $this->authorize('update', $job);
        $job->update(['status' => 'active']);
        return redirect()->route('employer.jobs.index')->with('success', 'Job posted successfully!');
    }

    public function close(Job $job)
    {
        $this->authorize('update', $job);
        $job->update(['status' => 'closed']);
        return redirect()->route('employer.jobs.index')->with('success', 'Job posting closed!');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
        $job->delete();
        return redirect()->route('employer.jobs.index')->with('success', 'Job posting deleted!');
    }
}
