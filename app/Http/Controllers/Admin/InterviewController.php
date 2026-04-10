<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interview;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::with('application.job', 'application.jobseeker')->paginate(10);
        return view('admin.interviews.index', compact('interviews'));
    }

    public function show(Interview $interview)
    {
        return view('admin.interviews.show', compact('interview'));
    }
}
