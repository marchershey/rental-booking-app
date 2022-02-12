<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create demo admin user
        $this->call([
            AdminSeeder::class,
            SettingsSeeder::class,
        ]);

        // create 10 users
        \App\Models\User::factory(10)->create();
    }
}
