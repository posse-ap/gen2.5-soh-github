<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BigQuestionsTableSeeder extends Seeder
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
        DB::table('big_questions')->insert($param);
        $param = [
            'pref_name' => '広島',
        ];
        DB::table('big_questions')->insert($param);
    }
}
