@extends('layouts.app')
@section('content')
<h2>All Interviews</h2>
@foreach($interviews as $interview)
<div>
    <a href="{{ route('admin.interviews.show', $interview) }}">
        Interview for {{ $interview->application->job->title }} -
        {{ $interview->application->jobseeker->name }}
    </a>
    ({{ $interview->scheduled_at }})
</div>
@endforeach
{{ $interviews->links() }}
@endsection