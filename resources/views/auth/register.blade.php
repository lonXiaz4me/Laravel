<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-sm">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6 text-center">Create an account</h1>

        <div class="bg-white shadow-sm rounded-lg p-6 border border-gray-200">

            @if ($errors->any())
                <div class="mb-4 rounded-md bg-red-50 border border-red-200 p-3">
                    <ul class="text-sm text-red-700 list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900"
                        placeholder="you@example.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required minlength="8"
                            oninput="updateStrength(this.value); checkMatch();"
                            class="w-full rounded-md border border-gray-300 px-3 py-2 pr-10 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password', this)"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600"
                            tabindex="-1">
                            <svg class="w-4 h-4 eye-open" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg class="w-4 h-4 eye-closed hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>

                    <!-- Strength indicator -->
                    <div class="mt-2">
                        <div class="flex gap-1 h-1.5">
                            <div id="bar-1" class="flex-1 rounded-full bg-gray-200 transition-colors"></div>
                            <div id="bar-2" class="flex-1 rounded-full bg-gray-200 transition-colors"></div>
                            <div id="bar-3" class="flex-1 rounded-full bg-gray-200 transition-colors"></div>
                            <div id="bar-4" class="flex-1 rounded-full bg-gray-200 transition-colors"></div>
                        </div>
                        <p id="strength-text" class="text-xs text-gray-400 mt-1">At least 8 characters</p>
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm
                        Password</label>
                    <div class="relative">
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            oninput="checkMatch()"
                            class="w-full rounded-md border border-gray-300 px-3 py-2 pr-10 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password_confirmation', this)"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600"
                            tabindex="-1">
                            <svg class="w-4 h-4 eye-open" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg class="w-4 h-4 eye-closed hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    <p id="match-text" class="text-xs mt-1"></p>
                </div>

                <button type="submit"
                    class="w-full bg-gray-900 text-white text-sm font-medium py-2.5 rounded-md hover:bg-gray-800 transition-colors">
                    Register
                </button>
            </form>

            <div class="my-4 flex items-center gap-3">
                <div class="h-px bg-gray-200 flex-1"></div>
                <span class="text-xs text-gray-400 uppercase">or</span>
                <div class="h-px bg-gray-200 flex-1"></div>
            </div>


            <a href="{{ route('google.redirect') }}"
                class="w-full flex items-center justify-center gap-2 border border-gray-300 rounded-md py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24">
                    <path fill="#4285F4"
                        d="M23.49 12.27c0-.79-.07-1.54-.19-2.27H12v4.51h6.47c-.29 1.48-1.14 2.73-2.42 3.58v3h3.91c2.29-2.11 3.53-5.22 3.53-8.82z" />
                    <path fill="#34A853"
                        d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.91-3c-1.09.73-2.48 1.16-4.02 1.16-3.09 0-5.71-2.09-6.64-4.89H1.32v3.09C3.29 21.3 7.31 24 12 24z" />
                    <path fill="#FBBC05"
                        d="M5.36 14.36c-.24-.72-.38-1.49-.38-2.36s.14-1.64.38-2.36V6.55H1.32C.48 8.24 0 10.06 0 12s.48 3.76 1.32 5.45l4.04-3.09z" />
                    <path fill="#EA4335"
                        d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.45-3.45C17.95 1.19 15.24 0 12 0 7.31 0 3.29 2.7 1.32 6.55l4.04 3.09c.93-2.8 3.55-4.89 6.64-4.89z" />
                </svg>
                Sign up with Google
            </a>
        </div>

        <p class="text-sm text-gray-500 text-center mt-4">
            Already registered?
            <a href="{{ route('login') }}" class="text-gray-900 font-medium hover:underline">Login</a>
        </p>
    </div>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';

            button.querySelector('.eye-open').classList.toggle('hidden', isHidden);
            button.querySelector('.eye-closed').classList.toggle('hidden', !isHidden);
        }

        function updateStrength(value) {
            const bars = [
                document.getElementById('bar-1'),
                document.getElementById('bar-2'),
                document.getElementById('bar-3'),
                document.getElementById('bar-4'),
            ];
            const text = document.getElementById('strength-text');

            // reset
            bars.forEach(bar => {
                bar.className = 'flex-1 rounded-full bg-gray-200 transition-colors';
            });

            if (value.length === 0) {
                text.textContent = 'At least 8 characters';
                text.className = 'text-xs text-gray-400 mt-1';
                return;
            }

            let score = 0;
            if (value.length >= 8) score++;
            if (value.length >= 12) score++;
            if (/[A-Z]/.test(value) && /[a-z]/.test(value)) score++;
            if (/[0-9]/.test(value)) score++;
            if (/[^A-Za-z0-9]/.test(value)) score++;

            // cap at 4 levels
            score = Math.min(score, 4);

            const levels = [
                { color: 'bg-red-400', label: 'Weak', textColor: 'text-red-500' },
                { color: 'bg-orange-400', label: 'Fair', textColor: 'text-orange-500' },
                { color: 'bg-yellow-400', label: 'Good', textColor: 'text-yellow-600' },
                { color: 'bg-green-500', label: 'Strong', textColor: 'text-green-600' },
            ];

            const level = value.length < 8
                ? { color: 'bg-red-400', label: 'Too short', textColor: 'text-red-500' }
                : levels[score - 1] ?? levels[0];

            const filled = value.length < 8 ? 1 : score;

            for (let i = 0; i < filled; i++) {
                bars[i].className = `flex-1 rounded-full ${level.color} transition-colors`;
            }

            text.textContent = level.label;
            text.className = `text-xs ${level.textColor} mt-1`;
        }

        function checkMatch() {
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('password_confirmation').value;
            const text = document.getElementById('match-text');

            if (confirm.length === 0) {
                text.textContent = '';
                return;
            }

            if (password === confirm) {
                text.textContent = 'Passwords match';
                text.className = 'text-xs mt-1 text-green-600';
            } else {
                text.textContent = 'Passwords do not match';
                text.className = 'text-xs mt-1 text-red-500';
            }
        }

    </script>

</body>

</html>