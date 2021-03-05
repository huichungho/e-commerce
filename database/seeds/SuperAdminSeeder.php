<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Create Super Admin Account

        $role = Role::create(['name' => 'superadmin']);
        $user = factory(User::class)->create(
            [
                'name' => 'superadmin',
                'email' => 'superadmin@ecommerce.com',
                'password' => Hash::make('superadmin'),
                'email_verified_at' => now(),
            ]
        );
        $user->assignRole($role->id);

        $this->command->warn('/---------------Admin Account:');
        $this->command->warn($user->email);
        $this->command->warn('Password is "superadmin"');
    }
}
