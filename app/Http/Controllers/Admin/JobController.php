<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('admin.jobs.show', compact('job'));
    }
}
