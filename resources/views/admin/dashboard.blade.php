<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workzap - Admin Dashboard</title>
</head>

<body>

    <h1>Admin Dashboard 🛠️</h1>
    <p>Welcome, {{ Auth::user()->first_name }}!</p>

    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>

</html>