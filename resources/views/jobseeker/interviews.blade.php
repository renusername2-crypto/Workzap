@extends('layouts.jobseeker')

@section('title', 'Interviews')

@section('content')
<div class="interviews-section">
    <h1>Scheduled Interviews</h1>
    <p>View and manage your interview schedules</p>

    <!-- Tabs -->
    <div class="tabs">
        <button class="tab active">Upcoming</button>
        <button class="tab">Past</button>
    </div>

    <!-- Upcoming Interviews -->
    <div class="interviews-list">
        <div class="interview-card">
            <div class="interview-header">
                <h3>Cashier Interview</h3>
                <span class="badge badge-confirmed">Confirmed</span>
            </div>
            <div class="interview-details">
                <p><strong>Company:</strong> XYZ Store</p>
                <p><strong>Position:</strong> Cashier</p>
                <p><strong>Date & Time:</strong> March 25, 2026 at 10:00 AM</p>
                <p><strong>Location:</strong> Davao City, Philippines</p>
                <p><strong>Interviewer:</strong> John Doe (Hiring Manager)</p>
            </div>
            <div class="interview-actions">
                <button class="btn btn-primary">Accept</button>
                <button class="btn btn-outline">Reschedule</button>
                <button class="btn btn-danger">Decline</button>
            </div>
        </div>

        <div class="interview-card">
            <div class="interview-header">
                <h3>Sales Associate Interview</h3>
                <span class="badge badge-pending">Pending</span>
            </div>
            <div class="interview-details">
                <p><strong>Company:</strong> ABC Retail Company</p>
                <p><strong>Position:</strong> Sales Associate</p>
                <p><strong>Status:</strong> Awaiting confirmation</p>
            </div>
            <div class="interview-actions">
                <button class="btn btn-outline">View Details</button>
            </div>
        </div>
    </div>
</div>
@endsection