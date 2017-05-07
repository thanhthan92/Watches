<?php

use Illuminate\Database\Seeder;

class Product_BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_brand')->insert([
            'name' => '--',
            'desc' => ''
        ]);
    }
}
