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
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'special'=>'all-access',
        ]);

        $user = User::create([
            'name'=>'Alan',
            'email'=>'Alancarabali@gmail.com',
            'password'=>'$2y$10$liZl2fBn4wBbJEAzsUobLuArOrEgurYORgMMPIw8J2yUU/BVSs/4y',
        ]);

        $user->roles()->sync(1);
    }
}
