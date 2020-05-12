<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Trần Đạt',
            'email' => 'trandat@gmail.com',
            'password' => Hash::make('123456'),
            'phone_number'=>'0352888056'
        ]);
    }
}
