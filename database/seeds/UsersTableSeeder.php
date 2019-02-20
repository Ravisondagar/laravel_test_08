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
            'department_id' => '1',
            'designation_id' => '1',
            'name' => 'Ravi',
            'middle_name' => 'N',
            'last_name' => 'Sondagar',
            'role' => 'admin',
            'email' => 'ravi@gmail.com',
            'password' => Hash::make('123'),
            'status' => '1',
            'team_lead' => 'yes',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
    }
}
