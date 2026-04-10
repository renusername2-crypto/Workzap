@extends('layouts.employer')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-section">
    <div class="dashboard-header">
        <div>
            <h1>Employer overview</h1>
            <p>Manage your job postings and applicants.</p>
        </div>
        <a href="{{ route('employer.jobs.create') }}" class="btn btn-primary">+ Post a job</a>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <h3>My job postings</h3>
            <div class="stat-number">6</div>
            <p class="stat-detail">4 active</p>
        </div>

        <div class="stat-card">
            <h3>Total applicants</h3>
            <div class="stat-number">34</div>
            <p class="stat-detail">+5 today</p>
        </div>

        <div class="stat-card">
            <h3>Interviews today</h3>
            <div class="stat-number">3</div>
            <p class="stat-detail">1 pending</p>
        </div>
    </div>

    <!-- Cards Grid -->
    <div class="cards-grid">
        <!-- Recent Applicants -->
        <div class="card">
            <div class="card-header">
                <h3>Recent applicants</h3>
                <a href="{{ route('employer.applications.index') }}" class="view-all-link">view all</a>
            </div>
            <div class="card-body">
                <div class="applicant-list-item">
                    <div>
                        <div class="applicant-name">Maria Reyes</div>
                        <div class="applicant-role">Sales Associate</div>
                    </div>
                    <span class="badge badge-interview">Interview</span>
                </div>
                <div class="applicant-list-item">
                    <div>
                        <div class="applicant-name">Ben Torres</div>
                        <div class="applicant-role">Warehouse Staff</div>
                    </div>
                    <span class="badge badge-screening">Screening</span>
                </div>
            </div>
        </div>

        <!-- My Job Postings -->
        <div class="card">
            <div class="card-header">
                <h3>My job postings</h3>
                <a href="{{ route('employer.jobs.index') }}" class="view-all-link">view all</a>
            </div>
            <div class="card-body">
                <div class="job-list-item">
                    <div>
                        <div class="job-title">Sales Associate</div>
                        <div class="job-applicants">14 applicants</div>
                    </div>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="job-list-item">
                    <div>
                        <div class="job-title">Cashier</div>
                        <div class="job-applicants">21 applicants</div>
                    </div>
                    <span class="badge badge-closing">Closing soon</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection