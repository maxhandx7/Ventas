<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Crear usuario administrador
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'alancarabali@gmail.com',
            'password' => bcrypt('17964290'),
        ]);
        $admin->assignRole('Admin');

        
       

    }
}
