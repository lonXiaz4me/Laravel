<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <style>
        /* only used to actually flip colors for the dark mode demo */
        body.dark { background: #111; color: #eee; }
        body.dark a { color: #8ab4ff; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a> |
        <a href="{{ route('settings') }}">Settings</a> |
        <a href="#">Reports (dummy)</a> |
        <a href="#">Profile (dummy)</a> |
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>

    <hr>

    <h1>Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>

    <script>
        // apply saved theme on load
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark');
        }
    </script>
</body>
</html>