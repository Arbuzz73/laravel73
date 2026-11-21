<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'user'],
            ['name' => 'journalist'],
            ['name' => 'admin'],
        ]);

        DB::table('categories')->insert([
            ['name' => 'Патчи'],
            ['name' => 'VCT'],
            ['name' => 'GC'],
            ['name' => 'Tier2'],
        ]);

        User::create([
            'name' => 'admin',
            'password' => Hash::make('12345678'),
            'role_id' => 3, // 3 - это admin
        ]);
    }
}