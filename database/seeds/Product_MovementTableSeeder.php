<?php

use Illuminate\Database\Seeder;

class Product_MovementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_movement')->insert([
            'name' => '--',
            'desc' => ''
        ]);
    }
}
