@extends('layouts.employer')

@section('title', 'Applicants')

@section('content')
<div class="applicants-section">
    <h1>Applicants</h1>
    <p>Review and manage your applicants.</p>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <input type="text" placeholder="Search applicant name..." class="search-input">
        <select class="filter-select">
            <option>Status</option>
            <option>Interview</option>
            <option>Screening</option>
            <option>Rejected</option>
        </select>
        <select class="filter-select">
            <option>Job Position</option>
            <option>Sales Associate</option>
            <option>Cashier</option>
        </select>
    </div>

    <!-- Applicants List -->
    <div class="applicants-list">
        <div class="applicant-card">
            <div class="applicant-info">
                <h3>Maria Reyes</h3>
                <p>Applied for: Sales Associate</p>
                <p class="date">Applied on: Mar 15, 2026</p>
            </div>
            <div class="badge badge-interview">Interview</div>
            <div class="card-actions">
                <button class="btn btn-outline">View Profile</button>
                <button class="btn btn-primary">Schedule Interview</button>
            </div>
        </div>

        <div class="applicant-card">
            <div class="applicant-info">
                <h3>Ben Torres</h3>
                <p>Applied for: Warehouse Staff</p>
                <p class="date">Applied on: Mar 18, 2026</p>
            </div>
            <div class="badge badge-screening">Screening</div>
            <div class="card-actions">
                <button class="btn btn-outline">View Profile</button>
                <button class="btn btn-primary">Schedule Interview</button>
            </div>
        </div>
    </div>
</div>
@endsection