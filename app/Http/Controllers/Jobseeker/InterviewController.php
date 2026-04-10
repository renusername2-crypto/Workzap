<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::whereHas('application', function ($q) {
            $q->where('applicant_id', Auth::id());
        })->with('application.job')->paginate(10);
        return view('jobseeker.interviews.index', compact('interviews'));
    }

    public function show(Interview $interview)
    {
        $this->authorize('view', $interview);
        return view('jobseeker.interviews.show', compact('interview'));
    }
}
