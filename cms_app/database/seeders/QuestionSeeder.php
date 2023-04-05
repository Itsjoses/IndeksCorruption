<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("questions")->insert([
            "indicator_id" => 1,
            "name" => "Pelayanan oleh petugas di lingkungan tinggal saya sesuai prosedur dan ketentuan dan tidak dipersulit untuk maksud tertentu.",
            "leftmost_parameter" => "Sangat Tidak Puas",
            "rightmost_parameter" => "Sangat Puas",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 1,
            "name" => "Petugas di lingkungan tinggal saya mampu menyampaikan informasi terkait pelayanan dengan baik.",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 1,
            "name" => "Petugas di lingkungan tinggal saya mampu bertanggung jawab atas pelayanan yang diberikan.",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 1,
            "name" => "Pelayanan oleh petugas di lingkungan tinggal saya selesai tepat waktu sesuai janji penyelesaian pelayanan.",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);

        DB::table("questions")->insert([
            "indicator_id" => 2,
            "name" => " Apakah Peraturan disini sangat layak?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 2,
            "name" => "Apakah Peraturan diwilayah ini didukung oleh masyarakat",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);


        DB::table("questions")->insert([
            "indicator_id" => 3,
            "name" => "Petugas meminta pungutan lebih untuk menyelesaikan layanan yang diberikan.",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 3,
            "name" => "Petugas menolak menyelesaikan tugas jika pungutan tidak diberikan.",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);

        DB::table("questions")->insert([
            "indicator_id" => 4,
            "name" => "Apakah pembangunan Disini sangat mantap?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 4,
            "name" => "Apakah Pembangunan berjalan dengan sangat cepat?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);

        DB::table("questions")->insert([
            "indicator_id" => 5,
            "name" => "Apakah Pembangunan jalan disini sudah cepat?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 5,
            "name" => "Apakah jalan yang ada diwilayah ini banyak yang rusak?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);


        DB::table("questions")->insert([
            "indicator_id" => 6,
            "name" => "pertanyaan1?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 6,
            "name" => "pertanyaan2?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);


        DB::table("questions")->insert([
            "indicator_id" => 7,
            "name" => "pertanyaan1 indikator2?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 7,
            "name" => "pertanyaan2 indikator2?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);


        DB::table("questions")->insert([
            "indicator_id" => 8,
            "name" => "pertanyaan1 indikator1 dimensi2?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 8,
            "name" => "pertanyaan2 indikator1 dimensi2?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);


        DB::table("questions")->insert([
            "indicator_id" => 9,
            "name" => "pertanyaan1 indikator2 dimensi2?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 9,
            "name" => "pertanyaan2 indikator2 dimensi2?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);


        DB::table("questions")->insert([
            "indicator_id" => 10,
            "name" => "pertanyaan1 indikator3?",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("questions")->insert([
            "indicator_id" => 10,
            "name" => "pertanyaan2 indikator3",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);

    }
}
