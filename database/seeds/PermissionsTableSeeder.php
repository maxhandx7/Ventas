<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $gerente = Role::create(['name' => 'Gerente']);
        $cashier = Role::create(['name' => 'Cashier']);
        $client = Role::create(['name' => 'Client']);




        $admin_user = User::create([
            'name' => 'Alan',
            'email' => 'Alancarabali@gmail.com',
            'password' => '$2y$10$liZl2fBn4wBbJEAzsUobLuArOrEgurYORgMMPIw8J2yUU/BVSs/4y', // Asegúrate de encriptar la contraseña
        ]);

        $admin_user->profile()->create();
        $admin_user->assignRole('Admin');


        //_____________________________________________________________//        

        $gerente_user = User::create([
            'name' => 'Charlie',
            'email' => 'carloslvgamboa@gmail.com',
            'password' => '$2y$10$liZl2fBn4wBbJEAzsUobLuArOrEgurYORgMMPIw8J2yUU/BVSs/4y',
        ]);
        $gerente_user->profile()->create();

        $gerente_user->assignRole('Gerente');    

        //_____________________________________________________________//        

        $cashier_user = User::create([
            'name' => 'Diana',
            'email' => 'dianaamaamiranda@gmail.com',
            'password' => '$2y$10$liZl2fBn4wBbJEAzsUobLuArOrEgurYORgMMPIw8J2yUU/BVSs/4y',
        ]);
        $cashier_user->profile()->create();

        $cashier_user->assignRole('Cashier');
        //__________________________________________________________________________//

        $client_user = User::create([
            'name' => 'User',
            'email' => 'maxhand171996@gmail.com',
            'password' => '$2y$10$liZl2fBn4wBbJEAzsUobLuArOrEgurYORgMMPIw8J2yUU/BVSs/4y',
        ]);
        $client_user->profile()->create();

        $client_user->assignRole('Client');

        //____________________________________________________________________________//
    }

}
