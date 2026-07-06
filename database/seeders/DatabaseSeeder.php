<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            AdminUserSeeder::class,
        ]);


        User::factory(100)->create()->each(function ($user) {
            $user->assignRole('player');
        });

        
    }
}