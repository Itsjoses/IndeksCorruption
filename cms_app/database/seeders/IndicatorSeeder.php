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
        DB::table("indicators")->insert([
            "dimension_id" => 2,
            "name" => "Pungutan Iuran",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);

        DB::table("indicators")->insert([
            "dimension_id" => 3,
            "name" => "Kemampuan Kekuasaan",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("indicators")->insert([
            "dimension_id" => 3,
            "name" => "Kebaikan kekuasaan",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);

        DB::table("indicators")->insert([
            "dimension_id" => 4,
            "name" => "Indikator 1",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("indicators")->insert([
            "dimension_id" => 4,
            "name" => "Indikator 2",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);

        DB::table("indicators")->insert([
            "dimension_id" => 5,
            "name" => "Indikator 1_1",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("indicators")->insert([
            "dimension_id" => 5,
            "name" => "Indikator 2_2",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);

    }
}
