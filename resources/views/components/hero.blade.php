{{--
    Component: Hero Section
    Usage: @include('components.hero')
--}}
<section class="hero" aria-labelledby="hero-heading">

    {{-- Background --}}
    <div class="hero__bg" role="img" aria-hidden="true"></div>
    <div class="hero__overlay" aria-hidden="true"></div>
    <div class="hero__noise"  aria-hidden="true"></div>
    <div class="hero__bottom-fade" aria-hidden="true"></div>

    {{-- Content --}}
    <div class="hero__content">

        {{-- Live badge --}}
        <div class="hero__badge" aria-label="Live beta available">
            <span class="hero__badge-dot" aria-hidden="true"></span>
            Live Beta Available
        </div>

        {{-- Eyebrow --}}
        <p class="hero__eyebrow">Football</p>

        {{-- Main headline --}}
        <h1 class="hero__title" id="hero-heading">
            Find Your Squad.
            <span class="hero__title-accent">Own The Pitch.</span>
        </h1>

        {{-- Sub-description --}}
        <p class="hero__desc">
            The ultimate indie platform for amateur footballers.
            Register, find local teams, book pitches, and track your stats — all in one place.
        </p>

        {{-- Call to Action --}}
        <div class="hero__cta">
            <a href="{{ route('register') }}" class="btn-hero-primary" role="button">
                {{-- Arrow icon --}}
                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M3 8h10M9 4l4 4-4 4" stroke="#000" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
                Create Free Account
            </a>

            <a href="{{ route('login') }}" class="btn-hero-secondary" role="button">
                Sign In
            </a>
        </div>

        {{-- Stats strip --}}
        <div class="hero__stats" aria-label="Platform statistics">

            <div class="hero__stat">
                <div class="hero__stat-value">12<span>K+</span></div>
                <div class="hero__stat-label">Players</div>
            </div>

            <div class="hero__stat-divider" aria-hidden="true"></div>

            <div class="hero__stat">
                <div class="hero__stat-value">840<span>+</span></div>
                <div class="hero__stat-label">Teams</div>
            </div>

            

        </div>
    </div>

</section>
