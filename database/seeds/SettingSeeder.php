<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'iso'=>'cop',
            'shipping_price'=>10000,
            'tax'=>0.19,
        ]);
    }
}
