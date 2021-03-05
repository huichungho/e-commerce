<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction')->insert(['details' => 'purchased Product 1', 'customer_id' => 1, 'user_id' => 2, 'total' => 20.50, 'created_at' => Carbon::now()]);
        DB::table('transaction')->insert(['details' => 'purchased Product 3', 'customer_id' => 1, 'user_id' => 2, 'total' => 50.00, 'created_at' => Carbon::now()]);
    }
}
