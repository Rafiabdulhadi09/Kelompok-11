<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserData = [
            // [
            //     'name'=>'Admin Kece',
            //     'email'=>'adminkece@gmail.com',
            //     'role'=>'admin',
            //     'password'=>bcrypt('12345678')
            // ],
            //     [
            //     'name'=>'Trainer Kece',
            //     'email'=>'trainerkece@gmail.com',
            //     'role'=>'trainer',
            //     'password'=>bcrypt('12345678')
            // ],
                [
                'name'=>'user Kece',
                'email'=>'userkece@gmail.com',
                'role'=>'user',
                'password'=>bcrypt('12345678')
            ],
        ];
        foreach($UserData as $key => $val){
            User::create($val);
        }
    }
}
