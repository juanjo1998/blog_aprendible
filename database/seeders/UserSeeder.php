<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'juanjo',
            'email' => 'juanjosr98@gmail.com',
            'password' => bcrypt(2.714462),
            'profile_photo' => 'user/profile_photo.png'
        ]);
    }
}
