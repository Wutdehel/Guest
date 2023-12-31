<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'adminsengked@gmail.com',
            'password' => Hash::make('4dmin.s3m3ru'),
            'level' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
          DB::table('users')->insert([
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'level' => 'user',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
