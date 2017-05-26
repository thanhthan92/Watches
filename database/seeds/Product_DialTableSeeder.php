<?php

use Illuminate\Database\Seeder;

class Product_DialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_dial')->insert([
            ['name' => '--', 'desc' => ''],
            ['name' => 'Kính cứng', 'desc' => ''],
            ['name' => 'Kính Sapphire', 'desc' => ''],
            ['name' => 'Kính đặc biệt', 'desc' => '']
        ]);
    }
}