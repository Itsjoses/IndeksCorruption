<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("dimensions")->insert([
            "survey_id" => 2,
            "name" => "Aturan & Prosedur",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("dimensions")->insert([
            "survey_id" => 2,
            "name" => "Transparansi Biaya",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("dimensions")->insert([
            "survey_id" => 2,
            "name" => "Pemimpinan Wilayah",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("dimensions")->insert([
            "survey_id" => 2,
            "name" => "Pembagian Kekuasaan",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("dimensions")->insert([
            "survey_id" => 2,
            "name" => "Dimensi 5",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
    }
}
