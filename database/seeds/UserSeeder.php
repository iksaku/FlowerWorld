<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrNew(['email' => 'flowerworld@gmail.com'], [
            'name' => 'Admin',
            'address' => 'México',
            'password' => Hash::make('password')
        ]);

        $admin->is_admin = true;

        $admin->save();
    }
}
