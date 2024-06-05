<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insert([
            [
                'name' => UserRole::OWNER->name,
            ],
            [
                'name' => UserRole::MANAGER->name,
            ],
            [
                'name' => UserRole::CASHIER->name,
            ]
        ]);
    }
}
