<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email', $email) }}" required autofocus><br><br>

        <label>New Password</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirm New Password</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>