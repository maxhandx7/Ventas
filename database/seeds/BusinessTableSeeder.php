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
            'description'=>'software design and development',
            'logo'=>'logo.svg',
            'mail'=>'Af@gmail.com',
            'address'=>'cra 26c#109-14, Cali, Colombia',
            'nit'=>'15247895632',
        ]);
    }
}
