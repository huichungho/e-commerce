<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert(['name' => 'Product 1', 'price' => 20.50, 'description' => 'Product 1 description']);
        DB::table('product')->insert(['name' => 'Product 2', 'price' => 13.50, 'description' => 'Product 2 description']);
        DB::table('product')->insert(['name' => 'Product 3', 'price' => 50.00, 'description' => 'Product 3 description']);
        DB::table('product')->insert(['name' => 'Product 4', 'price' => 120.00, 'description' => 'Product 4 description']);
    }
}
