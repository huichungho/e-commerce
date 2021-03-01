<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(SuperAdminSeeder::class);   //this is the Super Admin seeder
        $this->call(ProductSeeder::class); // this is the product seeder
        $this->call(CustomerSeeder::class); // this is the customer seeder
        $this->call(TransactionSeeder::class); // this is the transaction seeder
    }
}
