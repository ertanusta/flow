<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'name' => 'Admin Adminoğulları',
            'credit' => 12345.00,
            'password' => Hash::make('admin')
        ]);
    }
}
