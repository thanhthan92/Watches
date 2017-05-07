<?php

use Illuminate\Database\Seeder;

class Product_BandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_band')->insert([
            'name' => '--',
            'desc' => ''
        ]);
    }
}
