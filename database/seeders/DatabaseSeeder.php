<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create([
            'name'=> 'admin',
            'description' => 'admin role',
        ]);

        Role::create([
            'name'=> 'user',
            'description' => 'user role',
        ]);

        Permission::create([
            'name'=> 'add-category',
            'description' => 'user can add a new category',
        ]);

        Permission::create([
            'name'=> 'delete-category',
            'description' => 'user can delete a category',
        ]);
    }
}
