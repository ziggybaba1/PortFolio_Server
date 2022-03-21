<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Social;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            'name'=>'Ziggybaba',
            'email' => "admin@oluwaseyiadejugbagbe.com",
            // 'phone' => '08130567222',
            'password'=>bcrypt('admin123')
        ]);

        Social::create( [
            'name'=>'Ziggybaba1',
            'url' => "https://instagram.com/seyiadejugbagbe",
            'type'=>"instagram"
        ]);
        Social::create( [
            'name'=>'Ziggybaba1',
            'url' => "https://twitter.com/seyiadejugbagbe",
            'type'=>"twitter"
        ]);
        Social::create( [
            'name'=>'Ziggybaba1',
            'url' => "https://facebook.com/oluwaseyi.adejugbagbe",
            'type'=>"facebook"
        ]);
        Social::create( [
            'name'=>'Whatsapp',
            'url' => "https://wa.me?phone=+2348130567222",
            'type'=>"whatsapp"
        ]);
        Social::create( [
            'name'=>'gmail',
            'url' => "seyiadejugbagbe@gmail.com",
            'type'=>"gmail"
        ]);
        Social::create( [
            'name'=>'SeyiAdejugbagbe',
            'url' => "https://www.linkedin.com/in/seyi-adejugbagbe-2a0512114/",
            'type'=>"linkedn"
        ]);
    }
}
