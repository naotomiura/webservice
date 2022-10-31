<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;
use DateTime;

class QuizSeeder extends Seeder
{
    public function run()
    {
        $this->command->info("データの作成を開始します...");

        $memberSplFileObject = new \SplFileObject(__DIR__ . '/data/quiz.csv');
        $memberSplFileObject->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );

        $count = 0;
        foreach ($memberSplFileObject as $key => $row) {
            if ($key === 0) {
                continue;
            }

            Quiz::create([
                'id' => trim($row[0]),
                'post_id' => trim($row[1]),
                'problem' => trim($row[2]),
                'choice1' => trim($row[3]),
                'choice2' => trim($row[4]),
                'choice3' => trim($row[5]),
                'choice4' => trim($row[6]),
                'solution' => trim($row[7]),
                'explanation' => trim($row[8]),
            ]);
            $count++;
        }

        $this->command->info("データを{$count}件、作成しました。");
    }
}
