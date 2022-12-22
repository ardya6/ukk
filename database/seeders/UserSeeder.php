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
            'email'=>'admin@gmail.com',
            'password'=> bcrypt('12345'),
            'level'=> 'admin'
        ]);
    }
}
