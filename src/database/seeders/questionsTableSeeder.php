<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'big_question_id' => 1,
            'img' => 'takanawa.png',
        ];
        DB::table('questions')->insert($param);
        $param = [
            'big_question_id' => 1,
            'img' => 'kameido.png',
        ];
        DB::table('questions')->insert($param);
        $param = [
            'big_question_id' => 2,
            'img' => 'mukainada.png',
        ];
        DB::table('questions')->insert($param);
    }
}
