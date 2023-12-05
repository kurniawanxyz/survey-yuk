<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('roles')->insert([
            'status' => 'siswa'
        ]);

        DB::table('roles')->insert([
            'status' => 'admin'
        ]);

        DB::table("users")->insert([
            'nama' => 'admin',
            "role_id" => 2,
            "email" => "admin@gmail.com",
            'password' => Hash::make("password"),
        ]);

        DB::table("users")->insert([
            'nama' => 'Adi Kurniawan',
            "role_id" => 1,
            "email" => "kurniawan@gmail.com",
            'password' => Hash::make("password"),
        ]);
    }
}
