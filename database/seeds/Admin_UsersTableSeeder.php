<?php

use Illuminate\Database\Seeder;

class Admin_UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            'name'      => 'System Administrator',
            'email'     => 'sysadmin@gmail.com',
            'password'  => bcrypt('sysadmin')
        ]);
    }
}
