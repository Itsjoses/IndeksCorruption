<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("surveys")->insert([
            "year" => 2022,
            "created_at" => "2023-03-21 18:09:22",
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("surveys")->insert([
            "year" => 2023,
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
    }
}
