<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        User::create([
            "username" => "Admin",
            "password_2" => Hash::make('admin'),
            "level" => "Admin",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        User::create([
            "username" => "Guru",
            "password_2" => Hash::make('guru'),
            "level" => "Guru",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        User::create([
            "username" => "Siswa",
            "password_2" => Hash::make('siswa'),
            "level" => "Siswa",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);



    }
}
