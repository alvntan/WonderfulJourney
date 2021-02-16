<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $user = new User([
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'phone' => '081806295366',
            'role' => 'ADMIN'
        ]);
        $user->save();
    }
}
