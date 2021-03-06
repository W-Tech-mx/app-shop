<?php

use Illuminate\Database\Seeder;
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
        User::create([
        	'name' => 'Juan',
            'email' => 'juan@correo.com.mx',
            'password' => bcrypt('12345'),
            'admin' => true
        ]);
    }
}
