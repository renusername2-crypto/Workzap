@extends('layouts.jobseeker')

@section('title', 'Job Details')

@section('content')
<div class="job-detail-section">
    <div class="job-detail-header">
        <div>
            <h1>Sales Associate</h1>
            <p class="company">ABC Retail Company</p>
            <div class="job-meta">
                <span>📍 Davao City</span>
                <span>💼 Full-time</span>
                <span>₱15,000 - ₱25,000/month</span>
            </div>
        </div>
        <button class="btn btn-primary">Apply Now</button>
    </div>

    <div class="job-detail-grid">
        <!-- Main Content -->
        <div class="job-detail-content">
            <h2>Job Description</h2>
            <p>We are looking for enthusiastic and customer-focused Sales Associates to join our growing team. You will be responsible for providing excellent customer service, promoting our products, and achieving sales targets.</p>

            <h2>Responsibilities</h2>
            <ul>
                <li>Greet and assist customers</li>
                <li>Process sales transactions</li>
                <li>Maintain store displays and inventory</li>
                <li>Achieve monthly sales targets</li>
            </ul>

            <h2>Requirements</h2>
            <ul>
                <li>High school graduate or higher</li>
                <li>At least 1 year of retail experience</li>
                <li>Excellent communication skills</li>
                <li>Ability to work flexible hours</li>
            </ul>

            <h2>Benefits</h2>
            <ul>
                <li>Competitive salary</li>
                <li>Employee discount</li>
                <li>Performance bonus</li>
                <li>Career growth opportunities</li>
            </ul>
        </div>

        <!-- Sidebar -->
        <aside class="job-detail-sidebar">
            <div class="card">
                <h3>About the Company</h3>
                <p>ABC Retail Company is a leading retail chain in Southeast Asia...</p>
                <button class="btn btn-outline">View Company</button>
            </div>

            <div class="card">
                <h3>Application Status</h3>
                <p class="status-info">You have not applied for this job yet.</p>
                <button class="btn btn-primary" style="width: 100%;">Apply Now</button>
            </div>
        </aside>
    </div>
</div>
@endsection