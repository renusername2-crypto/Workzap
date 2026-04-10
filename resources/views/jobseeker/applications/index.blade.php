@extends('layouts.app')
@section('content')
<h2>My Applications</h2>
@foreach($applications as $application)
<div>
    <a href="{{ route('jobseeker.applications.show', $application) }}">{{ $application->job->title }}</a>
    (Status: {{ $application->status }})
    <form action="{{ route('jobseeker.applications.withdraw', $application) }}" method="POST">
        @csrf @method('DELETE')
        <button type="submit">Withdraw</button>
    </form>
</div>
@endforeach
{{ $applications->links() }}
@endsection