<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus><br><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <label><input type="checkbox" name="remember"> Remember me</label><br><br>

        <button type="submit">Login</button>
    </form>

    <p><a href="{{ route('google.redirect') }}">Login with Google</a></p>
    <p><a href="{{ route('register') }}">Register</a></p>
    <p><a href="{{ route('password.request') }}">Forgot your password?</a></p>
</body>
</html>