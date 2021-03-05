<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
use App\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'customer']);

        $faker = Faker\Factory::create();

        $user = factory(User::class)->create(
            [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('customer'),
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole($role->id);

        Customer::create([
            'user_id' => $user->id,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
        ]);

        $this->command->warn('/---------------Demo Customer Account:');
        $this->command->warn($user->email);
        $this->command->warn('Password is "customer"');
    }
}
