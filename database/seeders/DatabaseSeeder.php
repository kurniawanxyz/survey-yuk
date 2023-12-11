<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
            'status' => 'pengguna'
        ]);

        DB::table('roles')->insert([
            'status' => 'surveyor'
        ]);

        DB::table("users")->insert([
            'nama' => 'admin',
            "role_id" => 2,
            "permission" => 1,
            "email" => "admin@gmail.com",
            'password' => Hash::make("password"),
        ]);

        DB::table("users")->insert([
            'nama' => 'Adi Kurniawan',
            "role_id" => 1,
            "email" => "kurniawan@gmail.com",
            'password' => Hash::make("password"),
        ]);

        DB::table("groups")->insert([
            "nama" => "X RPL 1",
            "Deskripsi" => "RPL ANGKATAN 10",
            "code" => Str::random(7),
            "kreator_id" => 1,
        ]);

        DB::table('user_groups')->insert([
            "user_id" => 2,
            "group_id" => 1,
        ]);
    }
}
