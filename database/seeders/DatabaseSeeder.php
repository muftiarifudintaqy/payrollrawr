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

        User::updateOrCreate(
    ['email' => 'muftiarifudintaqy0@gmail.com'],
    [
        'name' => 'Mufti Ganteng Banget',
        'password' => bcrypt('password123'),
        'role' => 'admin',
        // field lain
    ]
);

        CompanySetting::factory()->create([
            'name' => 'PT.MUFTI_GANTENG',
            'description' => 'PT.MUFTI_GANTENG is a company that specializes in technology solutions.',
            'address' => 'Jl. Raya No. 123, Jakarta',
            'phone' => '62112345678',
            'value' => 'Bersama Membangun Bangsa',
        ]);
    }
}