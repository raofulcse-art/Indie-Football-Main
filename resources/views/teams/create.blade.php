<x-app-layout2>
    <div class="team-form-page">
        <div class="team-form-card">

            <h1 class="team-form-title">Create Team</h1>

            <p class="team-form-subtitle">
                Build your squad and become the captain of your team.
            </p>

            @if ($errors->any())
                <div class="team-form-errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('teams.store') }}">
                @csrf

                <div class="team-form-group">
                    <label for="name">Team Name</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your team name"
                        required
                    >
                </div>

                <button type="submit" class="btn-content">
                    Create Team
                </button>
            </form>

        </div>
    </div>
</x-app-layout2>