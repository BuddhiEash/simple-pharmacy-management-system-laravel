<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Smith',
                'user_name' => 'j_smith',
                'email' => 'j_smith@mail.com',
                'password' => Hash::make('j_smith@123'),
                'user_role_id' => UserRole::OWNER,
            ],
            [
                'first_name' => 'Andrew',
                'last_name' => 'Taylor',
                'user_name' => 'a_taylor',
                'email' => 'a_taylor@mail.com',
                'password' => Hash::make('a_taylor@123'),
                'user_role_id' => UserRole::MANAGER,
            ],
            [
                'first_name' => 'William',
                'last_name' => 'White',
                'user_name' => 'w_white',
                'email' => 'w_white@mail.com',
                'password' => Hash::make('w_white@123'),
                'user_role_id' => UserRole::CASHIER,
            ],
        ]);
    }
}
