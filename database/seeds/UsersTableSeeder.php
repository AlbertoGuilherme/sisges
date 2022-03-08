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
            'name' => 'Airosa',
            'sigu' =>'300160',
            'email' => '300160@isced-huila.ed.ao',
            'password' => bcrypt('euler1998'),
        ]);
    }
}
