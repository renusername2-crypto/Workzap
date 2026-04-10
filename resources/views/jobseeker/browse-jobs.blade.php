@extends('layouts.jobseeker')

@section('title', 'Browse Jobs')

@section('content')
<div class="browse-section">
    <div class="browse-header">
        <h1>Browse Jobs</h1>
        <p>Find your perfect job opportunity</p>
    </div>

    <!-- Search -->
    <div class="search-bar">
        <input type="text" placeholder="Job title, keywords..." class="search-input">
        <input type="text" placeholder="City or Region" class="search-input">
        <button class="btn btn-primary">Search</button>
    </div>

    <div class="browse-container">
        <!-- Filters -->
        <aside class="filters-sidebar">
            <div class="filter-group">
                <h4>Employment Type</h4>
                <label><input type="checkbox"> Full-time</label>
                <label><input type="checkbox"> Part-time</label>
                <label><input type="checkbox"> Contract</label>
            </div>

            <div class="filter-group">
                <h4>Salary Range</h4>
                <input type="range" class="salary-slider">
                <div class="salary-display">₱0 - ₱100,000</div>
            </div>

            <div class="filter-group">
                <h4>Location</h4>
                <label><input type="checkbox"> Metro Manila</label>
                <label><input type="checkbox"> Davao</label>
                <label><input type="checkbox"> Cebu</label>
            </div>
        </aside>

        <!-- Job Cards -->
        <div class="jobs-grid">
            <div class="job-card">
                <h3>Sales Associate</h3>
                <p class="company">ABC Retail Company</p>
                <p class="location">📍 Davao City</p>
                <p class="salary">₱15,000 - ₱25,000/month</p>
                <p class="description">We're looking for enthusiastic Sales Associates...</p>
                <div class="badge badge-active">Active</div>
                <button class="btn btn-primary">Apply Now</button>
            </div>

            <div class="job-card">
                <h3>Cashier</h3>
                <p class="company">XYZ Store</p>
                <p class="location">📍 Davao City</p>
                <p class="salary">₱12,000 - ₱18,000/month</p>
                <p class="description">High school graduate with retail experience...</p>
                <div class="badge badge-active">Active</div>
                <button class="btn btn-primary">Apply Now</button>
            </div>

            <div class="job-card">
                <h3>Warehouse Staff</h3>
                <p class="company">Logistics Corp</p>
                <p class="location">📍 Davao City</p>
                <p class="salary">₱14,000 - ₱20,000/month</p>
                <p class="description">Assist in warehouse operations and inventory...</p>
                <div class="badge badge-closing">Closing soon</div>
                <button class="btn btn-outline">Save Job</button>
            </div>
        </div>
    </div>
</div>
@endsection