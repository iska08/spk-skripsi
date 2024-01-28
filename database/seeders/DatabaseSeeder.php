<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Jenis;
use App\Models\Wisata;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Admin',
            'username' => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'level'    => 'ADMIN'
        ]);

        User::create([
            'name'     => 'User',
            'username' => 'user',
            'email'    => 'user@gmail.com',
            'password' => bcrypt('user1234'),
            'level'    => 'USER'
        ]);
    }
}
