<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class JobController extends Controller
{
    public function index(): View
    {
        $jobs = Job::where('employer_id', auth()->id())
            ->with('applications')
            ->latest()
            ->paginate(10);

        return view('employer.jobs.index', ['jobs' => $jobs]);
    }

    public function create(): View
    {
        return view('employer.jobs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string|in:Full-time,Part-time,Contract,Freelance',
            'salary' => 'nullable|string|max:255',
        ]);

        Job::create([
            'employer_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'job_type' => $validated['job_type'],
            'salary' => $validated['salary'],
            'status' => 'draft',
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job posting created successfully!');
    }

    public function edit(Job $job): View
    {
        $this->authorize('update', $job);
        return view('employer.jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job): RedirectResponse
    {
        $this->authorize('update', $job);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string|in:Full-time,Part-time,Contract,Freelance',
            'salary' => 'nullable|string|max:255',
            'status' => 'required|string|in:draft,active,closed',
        ]);

        $job->update($validated);

        if ($request->input('status') === 'active' && $job->posted_at === null) {
            $job->update(['posted_at' => now()]);
        }

        return redirect()->route('jobs.index')->with('success', 'Job posting updated successfully!');
    }

    public function publish(Job $job): RedirectResponse
    {
        $this->authorize('update', $job);

        $job->update([
            'status' => 'active',
            'posted_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Job posting published!');
    }

    public function close(Job $job): RedirectResponse
    {
        $this->authorize('update', $job);

        $job->update(['status' => 'closed']);

        return redirect()->back()->with('success', 'Job posting closed!');
    }

    public function destroy(Job $job): RedirectResponse
    {
        $this->authorize('delete', $job);

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job posting deleted!');
    }
}
