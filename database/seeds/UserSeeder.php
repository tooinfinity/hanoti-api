<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'password' => Hash::make('admin'),
        ]);

        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@app.com',
            'password' => Hash::make('manager'),
        ]);

        $cashier = User::create([
            'name' => 'cashier',
            'email' => 'cashier@app.com',
            'password' => Hash::make('cashier'),
        ]);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleManager = Role::create(['name' => 'manager']);
        $roleCashier = Role::create(['name' => 'cashier']);

        $admin->assignRole($roleAdmin);
        $admin->assignRole($roleManager);
        $admin->assignRole($roleCashier);
        $manager->assignRole($roleManager);
        $manager->assignRole($roleCashier);
        $cashier->assignRole($roleCashier);
    }
}
