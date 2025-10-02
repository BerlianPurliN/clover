<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Utama',
            'email' => 'admin2@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'nickname' => 'Admin',
            'mobile_phone' => '081234567890',
            'gender' => 'Laki-laki',
            'dob' => '1990-01-01',
            'role' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
