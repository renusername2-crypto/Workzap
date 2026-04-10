@extends('layouts.app')
@section('content')
<h2>All Applications</h2>
@foreach($applications as $app)
<div>
    <a href="{{ route('admin.applications.show', $app) }}">
        {{ $app->job->title }} - {{ $app->jobseeker->name }}
    </a>
    (Status: {{ $app->status }})
</div>
@endforeach
{{ $applications->links() }}
@endsection