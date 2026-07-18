<x-app-layout2>
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/team-search.css') }}"
    >

    <main class="team-search-page">
        <section class="team-search-card">

            <header class="team-search-header">
                <div>
                    <p class="team-search-label">
                        Find Your Squad
                    </p>

                    <h1 class="team-search-title">
                        Search Teams
                    </h1>

                    <p class="team-search-subtitle">
                        Search for a football team and view its members and basic
                        information.
                    </p>
                </div>
            </header>

            <div class="team-search-toolbar">
                <div class="team-search-input-wrapper">
                    <svg
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <circle cx="11" cy="11" r="8"></circle>
                        <line
                            x1="21"
                            y1="21"
                            x2="16.65"
                            y2="16.65"
                        ></line>
                    </svg>

                    <input
                        type="search"
                        id="teamSearchInput"
                        placeholder="Search teams by name..."
                        autocomplete="off"
                    >
                </div>
            </div>

            <div class="team-list-headings">
                <span>Team</span>
                <span>Team ID</span>
                <span>Members</span>
                <span>Action</span>
            </div>

            <div class="team-list-container">
                <div class="team-list-message">
                    Loading teams...
                </div>
            </div>

        </section>
    </main>

    <script src="{{ asset('assets/js/team-search.js') }}"></script>
</x-app-layout2>