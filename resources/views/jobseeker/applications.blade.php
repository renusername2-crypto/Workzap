@extends('layouts.jobseeker')

@section('title', 'My Applications')

@section('content')
<div class="applications-section">
    <h1>My Applications</h1>
    <p>Track all your job applications</p>

    <!-- Filter -->
    <div class="filter-bar">
        <select class="filter-select">
            <option>All Status</option>
            <option>Pending</option>
            <option>Interview</option>
            <option>Rejected</option>
            <option>Accepted</option>
        </select>
    </div>

    <!-- Applications List -->
    <div class="applications-list">
        <div class="application-card">
            <div class="application-info">
                <h3>Sales Associate</h3>
                <p>ABC Retail Company</p>
                <p class="date">Applied on Mar 15, 2026</p>
            </div>
            <div class="badge badge-pending">Pending</div>
            <div class="card-actions">
                <button class="btn btn-outline">View Job</button>
                <button class="btn btn-outline">Withdraw</button>
            </div>
        </div>

        <div class="application-card">
            <div class="application-info">
                <h3>Cashier</h3>
                <p>XYZ Store</p>
                <p class="date">Applied on Mar 18, 2026</p>
            </div>
            <div class="badge badge-interview">Interview Scheduled</div>
            <div class="card-actions">
                <button class="btn btn-outline">View Job</button>
                <button class="btn btn-outline">View Interview</button>
            </div>
        </div>

        <div class="application-card">
            <div class="application-info">
                <h3>Warehouse Staff</h3>
                <p>Logistics Corp</p>
                <p class="date">Applied on Mar 10, 2026</p>
            </div>
            <div class="badge badge-rejected">Rejected</div>
            <div class="card-actions">
                <button class="btn btn-outline">View Job</button>
            </div>
        </div>
    </div>
</div>
@endsection