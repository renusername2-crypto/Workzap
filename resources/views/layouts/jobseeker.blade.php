<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Workzap</title>
    <link rel="stylesheet" href="{{ asset('css/jobseeker.css') }}">
</head>

<body>
    <div class="jobseeker-wrapper">
        <!-- Navigation Bar -->
        <nav class="navbar">
            <div class="navbar-container">
                <div class="navbar-logo">
                    <span class="logo-icon">📍</span>
                    <span class="logo-name">Workzap</span>
                </div>

                <div class="navbar-menu">
                    <a href="{{ route('jobseeker.dashboard') }}" class="nav-link {{ request()->routeIs('jobseeker.dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('jobseeker.browse-jobs') }}" class="nav-link {{ request()->routeIs('jobseeker.browse-jobs') ? 'active' : '' }}">Browse Jobs</a>
                    <a href="{{ route('jobseeker.applications') }}" class="nav-link {{ request()->routeIs('jobseeker.applications') ? 'active' : '' }}">My Applications</a>
                    <a href="{{ route('jobseeker.interviews') }}" class="nav-link {{ request()->routeIs('jobseeker.interviews') ? 'active' : '' }}">Interviews</a>
                </div>

                <div class="navbar-actions">
                    <a href="{{ route('jobseeker.profile') }}" class="nav-link">Profile</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>

</html>