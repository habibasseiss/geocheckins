<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('admin');

        $user1 = App\User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => $password,
            ]);
    }
}
