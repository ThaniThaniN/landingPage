<?php

namespace Database\Seeders;

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
            'username' => 'main-admin',
            'email' => 'admin@example.com',
            'privilege' => '["dashboard","edit-ui","product-requests","suggestion-requests","moderators","translations"]',
            'password' => Hash::make('W@led12@#'),
        ]);

        $this->call(formRequestSeeder::class);

        $this->call(DefaultSiteSeeder::class);

    }
}
