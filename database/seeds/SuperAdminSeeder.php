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
        #Super Admin Seeder
//        $user = User::create([
//            'name' => 'Super Admin',
//            'email' => 'admin@ecommerce.com',
//            'password' => Hash::make('superadmin'),
//            'remember_token' => Str::random(60),
//        ]);

        $role = Role::create(['name' => 'superadmin']);
        $user = factory(User::class)->create(['name' => 'superadmin', 'password' => Hash::make('superadmin')]);
        $user->assignRole($role->id);
        $this->command->warn($user->email);
        $this->command->warn('Password is "superadmin"');
    }
}
