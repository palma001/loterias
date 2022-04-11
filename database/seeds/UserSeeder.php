<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrador
        $user = new User();
        $user->name = 'Pespinoza';
        $user->username = 'pespinoza';
        $user->password = bcrypt('120189');
        $user->level = User::LEVEL_ADMIN;
        $user->print_code = '0000000';
        $user->save();
    }
}
