<?php

use Illuminate\Database\Seeder;

class Product_GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_gender')->insert([
            'name' => '--',
            'desc' => ''
        ]);
    }
}
