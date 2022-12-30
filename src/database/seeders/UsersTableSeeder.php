<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'satou' => '佐藤',
            'suzuki' => '鈴木',
            'tanaka' => '田中'
        ];

        foreach($names as $email => $user){
            User::create([
                'name' => $user,
                'email' => $email.'@example.com',
                'password' => bcrypt('xxx')
            ]);
        }
    }
}
