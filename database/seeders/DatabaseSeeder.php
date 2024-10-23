<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => bcrypt('testuser123'),
        ])->assignRole($userRole);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('Allenlabrague123'),
        ]);

        $admin->assignRole($adminRole);
    }
}
