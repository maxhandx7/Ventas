<?php

use Illuminate\Database\Seeder;
use App\Business;
class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'name'=>'AF',
            'description'=>'Developers',
            'logo'=>'LOGO.png',
            'mail'=>'afdeveloper@gmail.com',
            'address'=>'cra 26c#109-14, Cali, Colombia',
            'phone' => '+573145561727',
            'nit'=>'15247895632',
        ]);
    }
}
