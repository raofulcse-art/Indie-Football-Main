<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $metaDescription ?? 'The ultimate indie platform for amateur footballers.' }}" />
    <title>{{ $title ?? 'PitchFinder — Find Your Squad. Own The Pitch.' }}</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/favicon.svg') }}" />

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/hero.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/content.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/user-list.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Slot for extra head content (additional page-level styles, meta tags, etc.) --}}
    {{ $head ?? '' }}
</head>
<body>

    {{-- ── Navbar ── --}}
    @include('partials.navbar2')

    {{-- ── Page Content ── --}}
    <main>
        {{ $slot }}
    </main>

    {{-- ── Footer ── --}}
    @include('partials.footer')

</body>
</html>
