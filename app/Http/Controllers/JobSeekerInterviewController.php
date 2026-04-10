<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerInterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::whereHas('application', function ($query) {
            $query->where('applicant_id', Auth::id());
        })->with(['application', 'application.job'])->get();

        return view('jobseeker.interviews', ['interviews' => $interviews]);
    }

    public function accept(Interview $interview)
    {
        $this->authorize('update', $interview);
        $interview->update(['status' => 'confirmed']);
        return redirect()->back()->with('success', 'Interview confirmed!');
    }

    public function decline(Interview $interview)
    {
        $this->authorize('update', $interview);
        $interview->delete();
        return redirect()->back()->with('success', 'Interview declined!');
    }
}
