<?php

use Illuminate\Database\Seeder;

class MartProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mart_products')->insert([
            'mart_id' => '1',
            'product_id' => '1',
        ]);
        DB::table('mart_products')->insert([
            'mart_id' => '2',
            'product_id' => '2',
        ]);
        DB::table('mart_products')->insert([
            'mart_id' => '3',
            'product_id' => '3',
        ]);
    }
}
