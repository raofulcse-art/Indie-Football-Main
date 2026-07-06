<x-app-layout2>

    <div class="profile-page">

        <div class="profile-card">

            <div class="profile-header">
                <p class="profile-label">Admin Panel</p>

                <h1 class="profile-title">
                    Edit User
                </h1>

                <p class="profile-subtitle">
                    Update this user's profile information from the admin dashboard.
                </p>
            </div>

            @if (session('status') === 'user-updated')
                <div class="profile-success">
                    User profile updated successfully.
                </div>
            @endif

            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="profile-form">
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

                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <button type="submit" class="btn-content">
                        Save Changes
                    </button>

                    <a href="{{ route('admin.users') }}" class="btn-secondary">
    Cancel
</a>
                </div>
            </form>

        </div>

    </div>

</x-app-layout2>