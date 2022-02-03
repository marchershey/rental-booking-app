<?php

namespace Database\Seeders;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = "Demo";
        $user->last_name = "User";
        $user->email = "demo@hershey.co";
        $user->birthdate = today();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        // $user->remember_token = Str::random(10);
        // $user->email_verified_at = now();
        $user->save();

        \App\Models\User::factory(10)->create();


        // Settings
        $settings = [
            'company_name' => 'Serrate\'s Getaways',
            'service_fee' => '15', // percentage
            'cleaning_fee' => '35', // fixed rate
        ];
        foreach($settings as $key => $value){
            Settings::create(['key' => $key, 'value' => $value]);
        }



    }
}
