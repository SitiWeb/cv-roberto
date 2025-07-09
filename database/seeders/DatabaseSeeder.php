<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => config('admin.email')],
            [
                'name' => config('admin.name'),
                'email' => config('admin.email'),
                'password' => Hash::make(config('admin.password')),
            ]
        );


            // Andere seeders uitvoeren
        $this->call([
            EducationSeeder::class,
            MediaSeeder::class,
            PersonaliaSeeder::class,
            SkillSeeder::class,
            WorkExperienceSeeder::class,
        ]);
    }
}
