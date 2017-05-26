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
            ['name' => '--',               'desc' => ''],
            ['name' => 'Tự động',               'desc' => ''],
            ['name' => 'Sang trọng',            'desc' => ''],
            ['name' => 'Thanh lịch (dress)',    'desc' => ''],
            ['name' => 'Thể thao',              'desc' => ''],
            ['name' => 'Đơn giản',              'desc' => ''],
            ['name' => 'Lặn',                   'desc' => '']
        ]);
    }
}
