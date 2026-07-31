<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Verify Email</title>
</head>
<body>
    <h1>Verify your email</h1>
    <p>We sent a 6-digit code to <strong>{{ $email }}</strong>.</p>

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

    <form method="POST" action="{{ route('otp.store') }}">
        @csrf
        <label>Code</label><br>
        <input type="text" name="otp" maxlength="6" inputmode="numeric" required autofocus><br><br>

        <button type="submit">Verify</button>
    </form>

    <form method="POST" action="{{ route('otp.resend') }}">
        @csrf
        <button type="submit">Resend code</button>
    </form>
</body>
</html>