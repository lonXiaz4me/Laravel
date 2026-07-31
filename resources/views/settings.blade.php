<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Settings</title>
    <style>
        body.dark { background: #111; color: #eee; }
        body.dark a { color: #8ab4ff; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a> |
        <a href="{{ route('settings') }}">Settings</a> |
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>

    <hr>

    <h1>Settings</h1>

    <label>
        <input type="checkbox" id="dark-toggle"> Dark mode
    </label>

    <script>
        const body = document.body;
        const toggle = document.getElementById('dark-toggle');

        // init from saved preference
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark');
            toggle.checked = true;
        }

        toggle.addEventListener('change', () => {
            if (toggle.checked) {
                body.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                body.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
</body>
</html>