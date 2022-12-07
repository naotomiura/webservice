<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrator::truncate();

        $administrators_data = [];
        for ($i = 1; $i <= 10; $i++) {
            $administrators_data[] = [
                'name' => sprintf($i),
                'userid' => sprintf('admin%03d', $i),
                'password' => sprintf('pass%04d', $i),
            ];
        }

        foreach($administrators_data as $data) {
            $administrator = new Administrator();
            $administrator->name = $data['name'];
            $administrator->userid = $data['userid'];
            $administrator->password = Hash::make($data['password']);
            $administrator->save();
        }
    }
}