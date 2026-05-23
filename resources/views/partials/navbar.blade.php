{{--
    Partial: Navbar
    Usage: @include('partials.navbar')
--}}
<nav class="navbar" role="navigation" aria-label="Main navigation">

    {{-- Logo --}}
    <a href="{{ route('home') }}" class="navbar__logo" aria-label="PitchFinder Home">
        @include('components.logo')
    </a>

    {{-- Auth Buttons --}}
    <div class="navbar__auth">
        @include('components.btn-login')
        @include('components.btn-register')
    </div>

</nav>
