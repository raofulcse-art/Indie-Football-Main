<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function teamMembership()
    {
        return $this->hasOne(TeamMember::class);
    }

    public function team()
    {
        return $this->hasOneThrough(
            Team::class,
            TeamMember::class,
            'user_id',
            'id',
            'id',
            'team_id'
        );
    }

    public function isCaptainOf(int $teamId): bool
    {
        return $this->teamMembership()
            ->where('team_id', $teamId)
            ->where('role', 'captain')
            ->exists();
    }

    public function isMemberOf(int $teamId): bool
    {
        return $this->teamMembership()
            ->where('team_id', $teamId)
            ->exists();
    }
    
}