<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use DateTime;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $this->command->info("データの作成を開始します...");

        $memberSplFileObject = new \SplFileObject(__DIR__ . '/data/category.csv');
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

            Category::create([
                'id' => trim($row[0]),
                'name' => trim($row[1]),
            ]);
            $count++;
        }

        $this->command->info("データを{$count}件、作成しました。");
    }
}
