<?php

use Illuminate\Database\Seeder;

class Product_CaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_case')->insert([
            'name' => '--',
            'desc' => ''
        ]);
    }
}
