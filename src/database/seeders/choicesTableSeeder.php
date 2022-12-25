<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'question_id' => 1,
            'name' => 'たかなわ',
            'valid' => 1,
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => 1,
            'name' => 'こうわ',
            'valid' => 0,
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => 1,
            'name' => 'たかわ',
            'valid' => 0,
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => 2,
            'name' => 'かめいど',
            'valid' => 1,
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => 2,
            'name' => 'かめど',
            'valid' => 0,
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => 2,
            'name' => 'かめと',
            'valid' => 0,
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => 3,
            'name' => 'むかいなだ',
            'valid' => 1,
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => 3,
            'name' => 'むこうひら',
            'valid' => 0,
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => 3,
            'name' => 'むきひら',
            'valid' => 0,
        ];
        DB::table('choices')->insert($param);
    }
}
