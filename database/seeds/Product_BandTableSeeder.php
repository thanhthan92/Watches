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
            ['name' => '--', 'desc' => ''],
            ['name' => 'Da', 'desc' => ''],
            ['name' => 'Nhựa', 'desc' => ''],
            ['name' => 'Thép không gỉ', 'desc' => ''],
            ['name' => 'Vải', 'desc' => '']
        ]);
    }
}
