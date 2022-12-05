<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use DateTime;

class PostSeeder extends Seeder
{
    public function run()
    {
        $this->command->info("データの作成を開始します...");

        $memberSplFileObject = new \SplFileObject(__DIR__ . '/data/post.csv');
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

            Post::create([
                'id' => trim($row[0]),
                'title' => trim($row[1]),
                'subtitle' => trim($row[2]),
                'image' => trim($row[3]),
                'category_id' => trim($row[4]),
            ]);
            $count++;
        }

        $this->command->info("データを{$count}件、作成しました。");
    }
    
}
