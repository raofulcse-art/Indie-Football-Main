{{--
    Component: Logo
    Usage: @include('components.logo')
    Props: $logoSize (optional, default 'md')
--}}
<span class="navbar__logo-icon" aria-hidden="true">
    {{-- Football / pitch icon --}}
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 1.5a8.5 8.5 0 0 1 8.5 8.5 8.5 8.5 0 0 1-8.5 8.5A8.5 8.5 0 0 1 3.5 12 8.5 8.5 0 0 1 12 3.5zm0 2.3l-2.1 1.53.8 2.47h2.6l.8-2.47L12 5.8zm-4.27 3.1l-2.5.82v2.56l2.14 1.55 1.95-1.42-.8-2.47-1-.62-.79-.42zm8.54 0l-.79.42-1 .62-.8 2.47 1.95 1.42 2.14-1.55v-2.56l-2.5-.82zm-5.85 3.7l-1.95 1.42.76 2.37 2.04.66 2.04-.66.76-2.37-1.95-1.42h-1.7z"/>
    </svg>
</span>

<span class="navbar__logo-text">Team<span>Arena</span></span>
