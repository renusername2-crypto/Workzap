@extends('layouts.jobseeker')

@section('title', 'Dashboard')

@section('content')
<div class="jobseeker-dashboard">

    <div class="dashboard-header">
        <h1>Welcome back!</h1>
        <p>Find your next opportunity with Workzap</p>
    </div>

    <!-- Quick Links -->
    <div style="margin-bottom: 20px;">
        <a href="{{ route('jobseeker.jobs.index') }}">View Jobs</a> |
        <a href="{{ route('jobseeker.applications.index') }}">My Applications</a> |
        <a href="{{ route('jobseeker.interviews.index') }}">Interviews</a>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Applications</h3>
            <div class="stat-number">12</div>
            <p>3 pending</p>
        </div>
        <div class="stat-card">
            <h3>Interviews</h3>
            <div class="stat-number">2</div>
            <p>1 upcoming</p>
        </div>
        <div class="stat-card">
            <h3>Saved Jobs</h3>
            <div class="stat-number">8</div>
        </div>
    </div>

    <!-- Cards -->
    <div class="cards-grid">
        <div class="card">
            <div class="card-header">
                <h3>Recent Applications</h3>
                <a href="{{ route('jobseeker.applications.index') }}" class="view-all-link">view all</a>
            </div>
            <div class="card-body">
                <div class="activity-item">
                    <div>
                        <div class="title">Sales Associate</div>
                        <div class="subtitle">ABC Retail Company</div>
                        <div class="date">Applied 2 days ago</div>
                    </div>
                    <span class="badge badge-pending">Pending</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Upcoming Interviews</h3>
                <a href="{{ route('jobseeker.interviews.index') }}" class="view-all-link">view all</a>
            </div>
            <div class="card-body">
                <div class="activity-item">
                    <div>
                        <div class="title">Cashier Interview</div>
                        <div class="subtitle">XYZ Store</div>
                        <div class="date">Mar 25, 2026 at 10:00 AM</div>
                    </div>
                    <span class="badge badge-confirmed">Confirmed</span>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta">
        <h2>Ready to apply for your dream job?</h2>
        <a href="{{ route('jobseeker.jobs.index') }}" class="btn btn-primary">Browse Jobs</a>
    </div>

</div>
@endsection