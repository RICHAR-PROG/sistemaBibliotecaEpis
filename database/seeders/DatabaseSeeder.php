<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('users')->insert([
            'name' => "Administrador",
            'email' => "administrador@unh.edu.pe",
            'dni' => "12345678",
            'password' => Hash::make('12345678'),
            'type_user' => 'admin'
        ]);

    }
}
