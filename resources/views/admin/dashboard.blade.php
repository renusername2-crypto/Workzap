@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="admin-dashboard">

    <h1>Admin Dashboard 🛠️</h1>
    <p>Welcome, {{ Auth::user()->first_name }}!</p>

    <!-- Quick Links -->
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.users.index') }}">Manage Users</a> |
        <a href="{{ route('admin.jobs.index') }}">Manage Jobs</a> |
        <a href="{{ route('admin.applications.index') }}">Manage Applications</a> |
        <a href="{{ route('admin.interviews.index') }}">Manage Interviews</a>
    </div>

    <!-- Logout -->
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</div>
@endsection