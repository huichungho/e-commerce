<?php

use Illuminate\Support\Facades\DB;
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
        DB::table('customer')->insert(['name' => 'Kimberly Robertson', 'email' => 'kimberly@gmail.com']);
        DB::table('customer')->insert(['name' => 'Stephen Mitchell', 'email' => 'stephen@gmail.com']);
        DB::table('customer')->insert(['name' => 'Natalie Bailey', 'email' => 'natalie@gmail.com']);
        DB::table('customer')->insert(['name' => 'Jonathan North', 'email' => 'jonathan@gmail.com']);
    }
}
