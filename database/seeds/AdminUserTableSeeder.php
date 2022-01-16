<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Nice Bin',
            'email' => 'binnice2326@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'type' => 'admin',
            'remember_token' => Str::random(10)
        ]);
    }
}
