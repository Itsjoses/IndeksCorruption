<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QestionTranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("question_translates")->insert([
            "name" => "Pelayanan oleh petugas di lingkungan tinggal saya sesuai prosedur dan ketentuan dan tidak dipersulit untuk maksud tertentu.",
            "leftmost_parameter" => "Sangat Tidak Puas",
            "rightmost_parameter" => "Sangat Puas",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("question_translates")->insert([
            "name" => "Petugas di lingkungan tinggal saya mampu menyampaikan informasi terkait pelayanan dengan baik.",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("question_translates")->insert([
            "name" => "Petugas di lingkungan tinggal is responsible.",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("question_translates")->insert([
            "name" => "Pelayanan oleh petugas di lingkungan tinggal saya selesai tepat waktu sesuai janji penyelesaian pelayanan.",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("question_translates")->insert([
            "name" => "Petugas meminta pungutan lebih untuk menyelesaikan layanan yang diberikan.",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
        DB::table("question_translates")->insert([
            "name" => "Petugas menolak menyelesaikan tugas jika pungutan tidak diberikan.",
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);
    }
}
