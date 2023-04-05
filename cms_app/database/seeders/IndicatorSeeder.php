<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("indicators")->insert([
            "dimension_id" => 1,
            "name" => "Kemudahan Layanan",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("indicators")->insert([
            "dimension_id" => 1,
            "name" => "Manipulasi Peraturan",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("indicators")->insert([
            "dimension_id" => 2,
            "name" => "Pungutan Biaya",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
    }
}
