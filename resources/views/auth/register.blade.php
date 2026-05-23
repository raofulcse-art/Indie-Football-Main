<x-auth-layout>
    @php $title = 'Create Account — TeamArena'; @endphp

    <section class="auth-page" aria-labelledby="auth-heading">
        <div class="auth-page__bg" aria-hidden="true"></div>
        <div class="auth-page__overlay" aria-hidden="true"></div>
        <div class="auth-page__noise" aria-hidden="true"></div>

        <div class="auth-card">

            <p class="auth-card__eyebrow">Join The Arena</p>
            <h1 class="auth-card__title" id="auth-heading">Create <span>Account.</span></h1>
            <p class="auth-card__subtitle">Find your squad. Own the pitch.</p>

            <div class="auth-divider"></div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="auth-field">
                    <label for="name">Full Name</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Your name"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    @error('name')
                        <p class="auth-error">{{ $message }}</p>
                    @enderror
                </div>

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
                        autocomplete="new-password"
                    />
                    @error('password')
                        <p class="auth-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="auth-field">
                    <label for="password_confirmation">Confirm Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="••••••••"
                        required
                        autocomplete="new-password"
                    />
                    @error('password_confirmation')
                        <p class="auth-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="auth-footer-row">
                    <a class="auth-link" href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit" class="btn-auth-submit">
                        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M3 8h10M9 4l4 4-4 4" stroke="#000" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Register
                    </button>
                </div>
            </form>

            <p class="auth-alt">
                Already have an account?
                <a href="{{ route('login') }}">Sign in →</a>
            </p>

        </div>
    </section>
</x-auth-layout>