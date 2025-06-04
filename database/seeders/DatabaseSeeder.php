<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    'password' => bcrypt('1234567890'),
    'is_admin' => true,
]);

CompanySetting::factory()->create([
    'name' => 'PT Mufti Karya Digital',
    'description' => 'Perusahaan teknologi yang mengedepankan inovasi dan kualitas.',
    'address' => 'Balls st, Bollocks ave, 1298',
    'phone' => '+62 23028398289392',
]);
    }
}
