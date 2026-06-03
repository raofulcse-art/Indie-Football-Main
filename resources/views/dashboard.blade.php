<x-app-layout2>


    <div style="height: 1000px;" class="content-container">
        <div class="contents">
            @can('manage users')
                <x-content-btn route="profile" value="Manage Users" />
            @endcan
            @can('create team')
                <x-content-btn route="teams.create" value="Create Team" />
            @endcan
            @can('view own team')
                <x-content-btn route="profile" value="Your Team" />
            @endcan
            
            
        </div>
    </div>
</x-app-layout2>
