<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
