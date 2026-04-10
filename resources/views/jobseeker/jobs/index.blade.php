@extends('layouts.app')
@section('content')
<h2>Available Jobs</h2>
@foreach($jobs as $job)
<div>
    <h3><a href="{{ route('jobseeker.jobs.show', $job) }}">{{ $job->title }}</a></h3>
    <form action="{{ route('jobseeker.jobs.apply', $job) }}" method="POST">
        @csrf
        <button type="submit">Apply</button>
    </form>
</div>
@endforeach
{{ $jobs->links() }}
@endsection