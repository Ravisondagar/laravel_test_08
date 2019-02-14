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
        DB::table('users')->insert([
            'name' => 'Ravi',
            'middle_name' => 'N',
            'last_name' => 'Sondagar',
            'email' => 'ravi@gmail.com',
            'password' => Hash::make('123'),
            'status' => '1',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
    }
}
