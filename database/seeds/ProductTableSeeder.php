<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Men Shoes',
            'description' => 'Mens Shoes',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Ladies Shoes',
            'description' => 'Ladies Shoes',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Kids Shoes',
            'description' => 'Kids Shoes',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
