<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use Illuminate\Support\Facades\File;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/skills.json');

        if (!File::exists($path)) {
            return;
        }

        // Verwijder alle bestaande records
        Skill::truncate();

        // Laad en decode de JSON
        $data = json_decode(File::get($path), true);

        // Voeg nieuwe data toe
        foreach ($data as $item) {
            Skill::create([
                'type' => $item['type'],
                'title' => $item['title'],
                'description' => $item['description'] ?? null,
                'rating' => $item['rating'] ?? null,
                'created_at' => $item['created_at'] ?? now(),
                'updated_at' => $item['updated_at'] ?? now(),
            ]);
        }
    }
}
