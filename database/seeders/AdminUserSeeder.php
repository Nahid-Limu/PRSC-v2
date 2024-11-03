<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'name'=>'Super',
                'email'=>'super@email.com',
                'password'=>bcrypt('admin'),

            ],
            [
                'name'=>'Admin',
                'email'=>'admin@email.com',
                'password'=>bcrypt('admin'),

            ],
        ];
        DB::table('users')->insert($data);
    }
}
