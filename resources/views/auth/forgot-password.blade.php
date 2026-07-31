<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>

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

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus><br><br>

        <button type="submit">Email Password Reset Link</button>
    </form>

    <p><a href="{{ route('login') }}">Back to login</a></p>
</body>
</html>