<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gudangku.com',
            'password' => bcrypt('password'), // password default
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Staff Gudang',
            'email' => 'staff@gudangku.com',
            'password' => bcrypt('password'),
            'role' => 'staff'
        ]);

        $this->call([
            SupplierSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
