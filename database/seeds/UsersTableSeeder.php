<?php

use Carbon\Carbon;
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
            'name' => 'Alvi',
            'email' => 'faridawan0@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
