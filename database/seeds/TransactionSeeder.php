<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction')->insert(['details' => 'purchased Product 1', 'customer_id' => 2]);
        DB::table('transaction')->insert(['details' => 'purchased Product 3', 'customer_id' => 2]);
    }
}
