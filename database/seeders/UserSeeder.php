<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Bob', 'email' => 'bob@example.com', 'password' => '1234', 'is_admin'=>true],
            ['name' => 'test', 'email' => 'test@test.com', 'password' => '1234', 'is_admin'=>true],
            ['name' => 'test2', 'email' => 'test2@test.com', 'password' => '1234', 'is_admin'=>true],
            ['name' => 'test3', 'email' => 'test3@test.com', 'password' => '1234', 'is_admin'=>true],
            ['name' => 'test4', 'email' => 'test4@test.com', 'password' => '1234', 'is_admin'=>true],
            ['name' => 'Alice', 'email' => 'alice@example.com', 'password' => '1234', 'is_admin'=>false],
        ];

        foreach($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'is_admin' => $user['is_admin'],
            ]);
        }

    }
}
