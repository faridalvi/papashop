<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marts')->insert([
            'name' => 'Aitemad Mart',
            'description' => 'Aitemad Mart',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('marts')->insert([
            'name' => 'Imtiaz Mart',
            'description' => 'Imtiaz Mart',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('marts')->insert([
            'name' => 'Hyper Store',
            'description' => 'Hyper Store',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
