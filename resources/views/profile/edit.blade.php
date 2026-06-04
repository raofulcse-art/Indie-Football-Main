<x-app-layout2>

    <div class="profile-page">

        <div class="profile-card">

            <div class="profile-header">
                <p class="profile-label">Player Profile</p>

                <h1 class="profile-title">
                    Manage Account
                </h1>

                <p class="profile-subtitle">
                    Update your profile information or delete your account.
                </p>
            </div>

            @if (session('status') === 'profile-updated')
                <div class="profile-success">
                    Profile updated successfully.
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" class="profile-form">
                @csrf
                @method('patch')

                <div class="profile-form-group">
                    <label for="name">Name</label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $user->name) }}"
                        required
                        autofocus
                    >

                    @error('name')
                        <p class="profile-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="profile-form-group">
                    <label for="email">Email</label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email', $user->email) }}"
                        required
                    >

                    @error('email')
                        <p class="profile-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-content">
                    Save Changes
                </button>
            </form>

        </div>

        @if(!auth()->user()->hasRole('admin'))
            <div class="profile-card danger-card">

            <div class="profile-header">
                <p class="profile-label danger-label">Danger Zone</p>

                <h2 class="profile-section-title">
                    Delete Account
                </h2>

                <p class="profile-subtitle">
                    Once your account is deleted, all related data may be removed permanently.
                </p>
            </div>

            <form method="POST" action="{{ route('profile.destroy') }}" class="profile-form">
                @csrf
                @method('delete')

                <div class="profile-form-group">
                    <label for="password">Confirm Password</label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Enter your password"
                        required
                    >

                    @error('password', 'userDeletion')
                        <p class="profile-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-danger">
                    Delete Account
                </button>
            </form>

        </div>
        @endif

    </div>

</x-app-layout2>