<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Permissions
        Permission::firstOrCreate(['name' => 'create team']);
        Permission::firstOrCreate(['name' => 'delete team']);
        Permission::firstOrCreate(['name' => 'join team']);

        // Roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $player = Role::firstOrCreate(['name' => 'player']);

        // Assign permissions
        $admin->givePermissionTo(Permission::all());
        $player->givePermissionTo('join team');
    }
}
    }
}
