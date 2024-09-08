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
                [
                'name'=>'Admin Kece',
                'email'=>'adminkece@gmail.com',
                'jk'=>'Laki-laki',
                'alamat'=>'JL Talagasari, No. 35, Kawalimukti, Kawali, Kawalimukti, Ciamis, Kabupaten Ciamis, Jawa Barat 46253',
                'keahlian'=>'Admin',
                'role'=>'admin',
                'password'=>bcrypt('12345678')
                ],
                [
                'name'=>'Trainer Kece',
                'email'=>'trainerkece@gmail.com',
                'jk'=>'Laki-laki',
                'alamat'=>'JL Talagasari, No. 35, Kawalimukti, Kawali, Kawalimukti, Ciamis, Kabupaten Ciamis, Jawa Barat 46253',
                'keahlian'=>'Design Grafis',
                'role'=>'trainer',
                'password'=>bcrypt('12345678')
                ],
                [
                'name'=>'user Kece',
                'email'=>'userkece@gmail.com',
                'jk'=>'Laki-laki',
                'alamat'=>'JL Talagasari, No. 35, Kawalimukti, Kawali, Kawalimukti, Ciamis, Kabupaten Ciamis, Jawa Barat 46253',
                'keahlian'=>'Pelajar',
                'role'=>'user',
                'password'=>bcrypt('12345678')
            ],
        ];
        foreach($UserData as $key => $val){
            User::create($val);
        }
    }
}
