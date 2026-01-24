<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure roles exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $superviseurRole = Role::firstOrCreate(['name' => 'superviseur']);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Change this to a secure password
            ]
        );
        $admin->assignRole($adminRole);

        // Create superviseur user
        $superviseur = User::firstOrCreate(
            ['email' => 'superviseur@example.com'],
            [
                'name' => 'Superviseur User',
                'password' => Hash::make('password'), // Change this to a secure password
            ]
        );
        $superviseur->assignRole($superviseurRole);
    }
}
