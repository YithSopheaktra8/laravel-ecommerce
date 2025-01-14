<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
                "name" => "Admin User",
                "username" => "adminuser",
                "email" => "admin@gmail.com",
                "role" => "admin",
                "password" => bcrypt("password"),
                "status" => "active",
            ],
            [
                "name" => "Vender User",
                "username" => "vendoruser",
                "email" => "vendor@gmail.com",
                "role" => "vendor",
                "password" => bcrypt("password"),
                "status" => "active",
            ],
            [
                "name" => "user",
                "username" => "user",
                "email" => "user@gmail.com",
                "role" => "user",
                "password" => bcrypt("password"),
                "status" => "active",
            ]
        ]);
    }
}
