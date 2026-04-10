@extends('layouts.employer')

@section('title', 'Edit Job Posting')

@section('content')
<div class="form-section">
    <h1>Edit job posting</h1>
    <p>Update the details of your job listing.</p>

    <form class="job-form">
        <div class="form-group">
            <label>Job Title</label>
            <input type="text" placeholder="e.g., Sales Associate" value="Sales Associate" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Employment Type</label>
                <select required>
                    <option>Full-time</option>
                    <option>Part-time</option>
                    <option>Contract</option>
                </select>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" placeholder="City or Region" value="Davao City" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Salary Min</label>
                <input type="number" placeholder="0" step="1000" value="15000">
            </div>
            <div class="form-group">
                <label>Salary Max</label>
                <input type="number" placeholder="0" step="1000" value="25000">
            </div>
        </div>

        <div class="form-group">
            <label>Job Description</label>
            <textarea rows="6" required>We are looking for a Sales Associate...</textarea>
        </div>

        <div class="form-group">
            <label>Requirements</label>
            <textarea rows="6" required>- High school graduate
- Sales experience preferred
- Excellent customer service skills</textarea>
        </div>

        <div class="form-group">
            <label>Benefits (Optional)</label>
            <textarea rows="4">- Health insurance
- Performance bonus</textarea>
        </div>

        <div class="form-actions">
            <button type="button" class="btn btn-outline">Cancel</button>
            <button type="submit" class="btn btn-primary">Update Job Posting</button>
        </div>
    </form>
</div>
@endsection