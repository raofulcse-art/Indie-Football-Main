<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view admin dashboard',
            'manage users',
            'manage teams',
            'manage tournaments',

            'create team',
            'view own team',
            'update own team',
            'delete own team',

            'invite players',
            'remove players',

            'send match request',
            'accept match request',

            'view tournaments',
            'join tournament',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $player = Role::firstOrCreate([
            'name' => 'player',
            'guard_name' => 'web',
        ]);

        $admin->syncPermissions(Permission::all());

        $player->syncPermissions([
            'create team',
            'view own team',
            'update own team',
            'delete own team',
            'invite players',
            'remove players',
            'send match request',
            'accept match request',
            'view tournaments',
            'join tournament',
        ]);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}