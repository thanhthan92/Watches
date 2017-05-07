<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Admin_UsersTableSeeder::class);
        $this->call(Product_SeriesTableSeeder::class);
        $this->call(Product_BrandTableSeeder::class);
		$this->call(Product_GenderTableSeeder::class);
		$this->call(Product_MovementTableSeeder::class);
		$this->call(Product_CaseTableSeeder::class);
		$this->call(Product_DialTableSeeder::class);
		$this->call(Product_BandTableSeeder::class);
		$this->call(Product_StyleTableSeeder::class);
    }
}