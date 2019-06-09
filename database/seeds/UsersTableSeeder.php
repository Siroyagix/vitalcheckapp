<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'id' => '1',
            'name' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => bcrypt('testuser1234'),
        ];
        DB::table('users')->insert($param);
    }
}
