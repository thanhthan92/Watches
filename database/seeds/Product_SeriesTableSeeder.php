<?php

use Illuminate\Database\Seeder;

class Product_SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_series')->insert([
            ['name' => '--', 'desc' => ''],
            ['name' => 'Originals', 'desc' => ''],
            ['name' => 'Hydroconquest', 'desc' => '']
        ]);
    }
}
