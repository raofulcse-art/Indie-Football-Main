{{--
    View: Landing / Home Page
    Route: GET /
    Controller: HomeController@index  (or web.php closure)
--}}
<x-app-layout>

    {{-- Override page title via slot if needed --}}
    @php
        $title           = 'PitchFinder — Find Your Squad. Own The Pitch.';
        $metaDescription = 'The ultimate indie platform for amateur footballers. Register, find local teams, book pitches, and track your stats — all in one place.';
    @endphp

    {{-- Hero --}}
    @include('components.hero')

</x-app-layout>
