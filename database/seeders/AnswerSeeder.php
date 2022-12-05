<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;
use DateTime;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
                'user_id' => '1',
                'quiz_id' => '1',
                'useranswer' => '2',
                'correct' => '1',
         ]);
        DB::table('answers')->insert([
                'user_id' => '1',
                'quiz_id' => '2',
                'useranswer' => '3',
                'correct' => '1',
         ]);
         DB::table('answers')->insert([
                'user_id' => '1',
                'quiz_id' => '3',
                'useranswer' => '4',
                'correct' => '0',
         ]);
         DB::table('answers')->insert([
                'user_id' => '1',
                'quiz_id' => '4',
                'useranswer' => '4',
                'correct' => '1',
         ]);
         DB::table('answers')->insert([
                'user_id' => '1',
                'quiz_id' => '5',
                'useranswer' => '3',
                'correct' => '1',
         ]);
         DB::table('answers')->insert([
                'user_id' => '1',
                'quiz_id' => '6',
                'useranswer' => '2',
                'correct' => '1',
         ]);
         
         
         DB::table('answers')->insert([
                'user_id' => '2',
                'quiz_id' => '1',
                'useranswer' => '4',
                'correct' => '0',
         ]);
        DB::table('answers')->insert([
                'user_id' => '2',
                'quiz_id' => '2',
                'useranswer' => '3',
                'correct' => '1',
         ]);
         DB::table('answers')->insert([
                'user_id' => '2',
                'quiz_id' => '3',
                'useranswer' => '4',
                'correct' => '0',
         ]);
         DB::table('answers')->insert([
                'user_id' => '2',
                'quiz_id' => '4',
                'useranswer' => '4',
                'correct' => '1',
         ]);
         DB::table('answers')->insert([
                'user_id' => '2',
                'quiz_id' => '5',
                'useranswer' => '3',
                'correct' => '1',
         ]);
         DB::table('answers')->insert([
                'user_id' => '2',
                'quiz_id' => '6',
                'useranswer' => '1',
                'correct' => '0',
         ]);
    }
}
