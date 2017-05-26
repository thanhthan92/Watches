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
            ['name' => '--',          'desc' => ''],
            ['name' => 'Hamilton',          'desc' => ''],
            ['name' => 'Longines',          'desc' => ''],
            ['name' => 'Rado',              'desc' => ''],
            ['name' => 'Bulova',            'desc' => ''],
            ['name' => 'Citizen',           'desc' => ''],
            ['name' => 'Movado',            'desc' => ''],
            ['name' => 'Mido',              'desc' => ''],
            ['name' => 'Raymond Weil',      'desc' => ''],
            ['name' => 'Victorinox',        'desc' => ''],
            ['name' => 'Baume & Mercier',   'desc' => ''],
            ['name' => 'Tissot',            'desc' => '']
        ]);
    }
}
