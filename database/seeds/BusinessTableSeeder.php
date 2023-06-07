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
            'name'=>'ANTO STORE 2000',
            'description'=>'Anto store 2000 es el lugar ideal para encontrar bolsos, ropa y accesorios de moda.',
            'logo'=>'logo.svg',
            'mail'=>'dianaamaamiranda@gmail.com',
            'address'=>'cra 26c#109-14, Cali, Colombia',
            'nit'=>'15247895632',
        ]);
    }
}
