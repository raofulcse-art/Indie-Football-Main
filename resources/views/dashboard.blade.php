<x-app-layout2>


    <div style="height: 1000px;" class="content-container">
        <div class="contents">
            @can('manage users')
                <x-content-btn route="admin.users" value="Manage Users" />
            @endcan
            @can('create team')
                @if(!auth()->user()->teamMembership()->exists())
                    <x-content-btn route="teams.create" value="Create Team" />
                @endif
            @endcan
            @can('view own team')
                @if(auth()->user()->teamMembership()->exists())
                    @php
                    $team = auth()->user()->team;
                    @endphp
                    <x-content-btn route="teams.show" :params="['team' => $team->id]" value="Your Team" />
                @endif
            @endcan
            
            
        </div>
    </div>
</x-app-layout2>
