<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'id' => '1',
                'name' => 'a',
                'email' => 'a@a',
                'password' => '12345678',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
         DB::table('users')->insert([
                'id' => '2',
                'name' => 'b',
                'email' => 'b@b',
                'password' => '12345678',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
         DB::table('users')->insert([
                'id' => '3',
                'name' => 'c',
                'email' => 'c@c',
                'password' => '12345678',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
         DB::table('users')->insert([
                'id' => '4',
                'name' => 'd',
                'email' => 'd@d',
                'password' => '12345678',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
         DB::table('users')->insert([
                'id' => '5',
                'name' => 'e',
                'email' => 'e@e',
                'password' => '12345678',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);

    }
}
