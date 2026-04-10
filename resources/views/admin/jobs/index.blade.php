@extends('layouts.app')
@section('content')
<h2>All Jobs</h2>
@foreach($jobs as $job)
<div>
    <a href="{{ route('admin.jobs.show', $job) }}">{{ $job->title }}</a>
    ({{ $job->employer->name }})
</div>
@endforeach
{{ $jobs->links() }}
@endsection