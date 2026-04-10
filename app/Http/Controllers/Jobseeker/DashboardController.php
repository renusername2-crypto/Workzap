<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('jobseeker.dashboard');
    }
}
