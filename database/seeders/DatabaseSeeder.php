<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'role' => 'admin',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);
        
        DB::table('users')->insert([
            'role' => 'teacher',
            'first_name' => 'Nokisbay',
            'last_name' => 'Qoniratbaev',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'group_id' => '1',
            'role' => 'student',
            'first_name' => 'Pakhatov',
            'last_name' => 'Salamat',
            'email' => 'salamat@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'group_id' => '1',
            'role' => 'student',
            'first_name' => 'Usnatdin',
            'last_name' => 'Durshimov',
            'email' => 'usnatdin@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'group_id' => '1',
            'role' => 'student',
            'first_name' => 'Ulugbek',
            'last_name' => 'Muratbaev',
            'email' => 'ulugbek@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'group_id' => '2',
            'role' => 'student',
            'first_name' => 'Sulayman',
            'last_name' => 'Atamuratov',
            'email' => 'sulayman@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'group_id' => '2',
            'role' => 'student',
            'first_name' => 'Nurlibek',
            'last_name' => 'Kurbanbaev',
            'email' => 'nurlibek@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'group_id' => '2',
            'role' => 'student',
            'first_name' => 'Gulbaxar',
            'last_name' => 'Umarova',
            'email' => 'guma@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('groups')->insert([
            'name' => '1D-Telekom'
        ]);
        DB::table('groups')->insert([
            'name' => '2A-Kiber'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Computer Science'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Optika'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Analytic database'
        ]);
    }
}
