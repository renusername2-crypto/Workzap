@extends('layouts.app')
@section('content')
<h2>My Interviews</h2>
@foreach($interviews as $interview)
<div>
    <a href="{{ route('jobseeker.interviews.show', $interview) }}">
        Interview for {{ $interview->application->job->title }}
    </a>
    (Scheduled: {{ $interview->scheduled_at }})
</div>
@endforeach
{{ $interviews->links() }}
@endsection