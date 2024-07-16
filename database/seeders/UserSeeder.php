<?php

namespace Database\Seeders;

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
            [
                'name' => 'Pendamping User',
                'email' => 'pendamping@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pendamping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penduduk User',
                'email' => 'penduduk@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'penduduk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
