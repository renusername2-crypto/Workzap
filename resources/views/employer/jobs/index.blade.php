@extends('layouts.employer')

@section('title', 'My Job Postings')

@section('content')
<div class="jobs-section">
    <div class="jobs-header">
        <div>
            <h1>My job postings</h1>
            <p>Manage all your job listings here.</p>
        </div>
        <a href="{{ route('employer.jobs.create') }}" class="btn btn-primary">+ Post a job</a>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <input type="text" placeholder="Search job title..." class="search-input">
        <select class="filter-select">
            <option>Status</option>
            <option>Active</option>
            <option>Closed</option>
            <option>Draft</option>
        </select>
        <select class="filter-select">
            <option>Date posted</option>
            <option>Newest</option>
            <option>Oldest</option>
        </select>
    </div>

    <!-- Tabs -->
    <div class="tabs">
        <button class="tab active">All (6)</button>
        <button class="tab">Active (4)</button>
        <button class="tab">Closed (1)</button>
        <button class="tab">Draft (1)</button>
    </div>

    <!-- Job Cards -->
    <div class="job-cards-list">
        <div class="job-card">
            <h3>Sales Associate</h3>
            <p class="job-meta">Full-time · Davao City · Posted March 20, 2026</p>
            <div class="card-actions">
                <button class="btn btn-outline">Edit</button>
                <button class="btn btn-outline">View</button>
                <button class="btn btn-danger">Close</button>
            </div>
        </div>

        <div class="job-card">
            <h3>Cashier</h3>
            <p class="job-meta">Full-time · Davao City · Posted March 20, 2026</p>
            <div class="card-actions">
                <button class="btn btn-outline">Edit</button>
                <button class="btn btn-outline">View</button>
                <button class="btn btn-danger">Close</button>
            </div>
        </div>

        <div class="job-card">
            <h3>Security Guard</h3>
            <p class="job-meta">Full-time · Davao City · Not yet published</p>
            <div class="card-actions">
                <button class="btn btn-outline">Edit</button>
                <button class="btn btn-primary">Publish</button>
            </div>
        </div>
    </div>
</div>
@endsection