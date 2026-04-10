<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Workzap Employer</title>
    <link rel="stylesheet" href="{{ asset('css/employer.css') }}">
</head>

<body>
    <div class="employer-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <span class="logo-icon">📍</span>
                    <div class="logo-text">
                        <div class="logo-name">Workzap</div>
                        <div class="logo-subtitle">Employer</div>
                    </div>
                </div>
            </div>

            <nav class="sidebar-menu">
                <a href="{{ route('employer.dashboard') }}" class="menu-item {{ request()->routeIs('employer.dashboard') ? 'active' : '' }}">
                    <span class="menu-icon">🏠</span>
                    <span class="menu-text">Dashboard</span>
                </a>
                <a href="{{ route('employer.jobs.index') }}" class="menu-item {{ request()->routeIs('employer.jobs.*') ? 'active' : '' }}">
                    <span class="menu-icon">📋</span>
                    <span class="menu-text">My job postings</span>
                </a>
                <a href="{{ route('employer.applications.index') }}" class="menu-item {{ request()->routeIs('employer.applications.*') ? 'active' : '' }}">
                    <span class="menu-icon">👥</span>
                    <span class="menu-text">Applicants</span>
                </a>
                <a href="{{ route('employer.interviews.index') }}" class="menu-item {{ request()->routeIs('employer.interviews.*') ? 'active' : '' }}">
                    <span class="menu-icon">📅</span>
                    <span class="menu-text">Interviews</span>
                </a>
                <a href="{{ route('employer.profile') }}" class="menu-item {{ request()->routeIs('employer.profile') ? 'active' : '' }}">
                    <span class="menu-icon">👤</span>
                    <span class="menu-text">My profile</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST" style="width: 100%;">
                    @csrf
                    <button type="submit" class="menu-item logout-btn">
                        <span class="menu-icon">🚪</span>
                        <span class="menu-text">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>

</html>