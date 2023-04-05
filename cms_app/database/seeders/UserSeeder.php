<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("users")->insert([
            "role_id" => 1,
            "name" => "Chelsey",
            "username" => "admin",
            "email" => "chellseych@gmail.com",
            "password" => bcrypt("admin"),
            "is_accepted" => true,
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("users")->insert([
            "role_id" => 2,
            "name" => "Chelsey",
            "username" => "admin2",
            "email" => "chellseych@outlook.com",
            "password" => bcrypt("admin2"),
            "is_accepted" => true,
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("users")->insert([
            "role_id" => 3,
            "name" => "Chelsey",
            "username" => "admin3",
            "email" => "chellseych@binus.ac.id",
            "password" => bcrypt("admin3"),
            "is_accepted" => false,
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
    }
}
