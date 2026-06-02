<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTeamMember
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $team = $request->route('team');

        if (! $user) {
            abort(403);
        }

        if ($user->hasRole('admin')) {
            return $next($request);
        }

        $teamId = is_object($team) ? $team->id : (int) $team;

        if (! $user->isMemberOf($teamId)) {
            abort(403, 'Only team members can access this page.');
        }

        return $next($request);
    }
}