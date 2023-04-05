<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomicileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("domiciles")->insert([
            "participant_id" => 1,
            "city_id" => 1,
            "start_date" => "2022-01-01",
            "end_date" => "2022-05-01",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("domiciles")->insert([
            "participant_id" => 1,
            "city_id" => 10,
            "start_date" => "2022-05-01",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("domiciles")->insert([
            "participant_id" => 2,
            "city_id" => 3,
            "start_date" => "2022-01-01",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("domiciles")->insert([
            "participant_id" => 3,
            "city_id" => 14,
            "start_date" => "2022-01-01",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("domiciles")->insert([
            "participant_id" => 4,
            "city_id" => 36,
            "start_date" => "2022-01-01",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("domiciles")->insert([
            "participant_id" => 5,
            "city_id" => 40,
            "start_date" => "2022-01-01",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
    }
}
