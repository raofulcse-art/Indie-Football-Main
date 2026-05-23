<x-auth-layout>
    @php $title = 'Sign In — TeamArena'; @endphp

    <section class="auth-page" aria-labelledby="auth-heading">
        <div class="auth-page__bg" aria-hidden="true"></div>
        <div class="auth-page__overlay" aria-hidden="true"></div>
        <div class="auth-page__noise" aria-hidden="true"></div>

        <div class="auth-card">

            <p class="auth-card__eyebrow">Welcome Back</p>
            <h1 class="auth-card__title" id="auth-heading">Sign <span>In.</span></h1>
            <p class="auth-card__subtitle">Back on the pitch. Let's go.</p>

            <div class="auth-divider"></div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="auth-session-status">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="auth-field">
                    <label for="email">Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="you@example.com"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    @error('email')
                        <p class="auth-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="auth-field">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                    />
                    @error('password')
                        <p class="auth-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="auth-check-row">
                    <input id="remember_me" type="checkbox" name="remember" />
                    <label for="remember_me">Remember me</label>
                </div>

                <div class="auth-footer-row">
                    @if (Route::has('password.request'))
                        <a class="auth-link" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif

                    <button type="submit" class="btn-auth-submit">
                        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M3 8h10M9 4l4 4-4 4" stroke="#000" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Sign In
                    </button>
                </div>
            </form>

            <p class="auth-alt">
                No account yet?
                <a href="{{ route('register') }}">Create one free →</a>
            </p>

        </div>
    </section>
</x-auth-layout>