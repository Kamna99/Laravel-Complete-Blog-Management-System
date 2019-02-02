<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'=>"Laravel's Blog",
            'address'=>'India',
            'contact_number'=>'+91-987654321',
            'contact_email'=>'default@gmail.com'
        ]);
    }
}
