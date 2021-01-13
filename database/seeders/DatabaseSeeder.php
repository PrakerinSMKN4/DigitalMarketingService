<?php

namespace Database\Seeders;
use \App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => "Admin",
            'username' => "admin",
            'no_handphone' => '098517842555',
            'role' => '1',
            'email' => "admin@gmail.com",
            'password' => Hash::make('admin'),
        ]);
    }
}
