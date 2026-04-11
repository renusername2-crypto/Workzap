<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class InterviewController
{
    // Other existing methods...

    public function accept(Request $request, $id)
    {
        // Logic for accepting the interview
        $interview = Job::find($id);
        if ($interview) {
            $interview->status = 'accepted';
            $interview->save();
            return response()->json(['message' => 'Interview Accepted!'], 200);
        }
        return response()->json(['message' => 'Interview Not Found!'], 404);
    }

    public function decline(Request $request, $id)
    {
        // Logic for declining the interview
        $interview = Job::find($id);
        if ($interview) {
            $interview->status = 'declined';
            $interview->save();
            return response()->json(['message' => 'Interview Declined!'], 200);
        }
        return response()->json(['message' => 'Interview Not Found!'], 404);
    }
}
