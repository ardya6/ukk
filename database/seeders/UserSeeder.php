<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvent;
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
        \App\Models\User::create([
            'name'=> 'administrator',
            'email'=>'admin1@gmail.com',
            'password'=> bcrypt('123456'),
            'level'=> 'admin'
        ]);
    }
}
