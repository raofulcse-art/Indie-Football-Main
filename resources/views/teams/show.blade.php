<x-app-layout2>

    <div class="team-show-page">

        <div class="team-show-card">

            {{-- Team Header --}}
            <div class="team-show-header">

                <div>
                    <p class="team-show-label">
                        TEAM
                    </p>

                    <h1 class="team-show-title">
                        {{ $team->name }}
                    </h1>
                </div>

                <div class="team-show-badge">
                    ACTIVE
                </div>

            </div>

            {{-- Team Info --}}
            <div class="team-show-section">

                <h2 class="team-show-section-title">
                    Team Information
                </h2>

                <div class="team-show-grid">

                    <div class="team-show-info-card">
                        <p class="team-show-info-label">
                            Captain ID
                        </p>

                        <p class="team-show-info-value">
                            {{ $team->captain_id }}
                        </p>
                    </div>

                    <div class="team-show-info-card">
                        <p class="team-show-info-label">
                            Created By
                        </p>

                        <p class="team-show-info-value">
                            {{ $team->created_by }}
                        </p>
                    </div>

                    <div class="team-show-info-card">
                        <p class="team-show-info-label">
                            Created At
                        </p>

                        <p class="team-show-info-value">
                            {{ $team->created_at->format('d M Y') }}
                        </p>
                    </div>

                    <div class="team-show-info-card">
                        <p class="team-show-info-label">
                            Total Members
                        </p>

                        <p class="team-show-info-value">
                            {{ $team->members->count() }}
                        </p>
                    </div>

                </div>

            </div>

            {{-- Team Members --}}
            <div class="team-show-section">

                <div class="team-show-members-header">

                    <h2 class="team-show-section-title">
                        Team Members
                    </h2>

                    @if(auth()->user()->id === $team->captain_id)
                        <a href="#" class="btn-content">
                            Invite Player
                        </a>
                    @endif

                </div>

                <div class="team-members-list">

                    @forelse($team->members as $member)

                        <div class="team-member-card">

                            <div>
                                <p class="team-member-name">
                                    {{ $member->user->name }}
                                </p>

                                <p class="team-member-email">
                                    {{ $member->user->email }}
                                </p>
                            </div>

                            <div class="team-member-role
                                {{ $member->role === 'captain' ? 'captain-role' : '' }}">
                                {{ strtoupper($member->role) }}
                            </div>

                        </div>

                    @empty

                        <p class="team-empty-text">
                            No team members found.
                        </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</x-app-layout2>