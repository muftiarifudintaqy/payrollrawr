<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mufti Ganteng Banget',
            'email' => 'muftiarifudintaqy0@gmail.com',
            'password' => bcrypt('gmailnya'),
            'role' => 'admin',
        ]);

        CompanySetting::factory()->create([
            'name' => 'PT. Nusa',
            'description' => 'PT. Nusa is a company that specializes in technology solutions.',
            'address' => 'Jl. Raya No. 123, Jakarta',
            'phone' => '62112345678',
            'value' => 'Bersama Membangun Bangsa',
        ]);
    }
}