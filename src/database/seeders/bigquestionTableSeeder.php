<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bigquestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'pref_name' => '東京',
        ];
        DB::table('bigquestions')->insert($param);
        $param = [
            'pref_name' => '広島',
        ];
        DB::table('bigquestions')->insert($param);
    }
}
