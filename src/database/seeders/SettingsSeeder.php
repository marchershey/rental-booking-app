<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Settings::create(
            ['key' => 'cleaning_fee', 'value' => 175],
            ['key' => 'guest_service_fee_percentage', 'value' => 0.1],
            ['key' => 'host_service_fee_percentage', 'value' => 0.03],
            ['key' => 'ky_sales_tax', 'value' => 0.06],
            ['key' => 'ky_transient_tax', 'value' => 0.03]
        );
    }
}
