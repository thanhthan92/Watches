<?php

use Illuminate\Database\Seeder;

class Product_StyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_style')->insert([
            'name' => '--',
            'desc' => ''
        ]);
    }
}
