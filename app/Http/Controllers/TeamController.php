<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Models\Team;
use App\Models\TeamMember;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function create()
    {
        return view('teams.create');
    }

    public function store(StoreTeamRequest $request)
    {
        $user = $request->user();

        if ($user->teamMembership()->exists()) {
            return back()->withErrors([
                'name' => 'You are already part of a team.',
            ])->withInput();
        }

        $team = DB::transaction(function () use ($request, $user) {
            $team = Team::create([
                'name' => $request->name,
                'created_by' => $user->id,
                'captain_id' => $user->id,
            ]);

            TeamMember::create([
                'user_id' => $user->id,
                'team_id' => $team->id,
                'role' => 'captain',
                'joined_at' => now(),
            ]);

            return $team;
        });

        return redirect()
            ->route('teams.show', $team)
            ->with('success', 'Team created successfully.');
    }

    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }
}