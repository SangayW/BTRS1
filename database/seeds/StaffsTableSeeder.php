<?php

use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            'name' => 'namgay',
            'email' => 'namgay@gmail.com',
            'password' => bcrypt('namgay'),
        ]);
    }
}
