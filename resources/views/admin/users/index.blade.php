@extends('layouts.app')
@section('content')
<h2>All Users</h2>
@foreach($users as $user)
<div><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }} ({{ $user->role }})</a></div>
@endforeach
{{ $users->links() }}
@endsection