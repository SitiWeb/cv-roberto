<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\File;

class WorkExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = database_path('data/work_experiences.json');

        // Bestaat het JSON-bestand?
        if (!File::exists($jsonPath)) {
            $this->command->warn("❌ Bestand $jsonPath niet gevonden. Seeder overgeslagen.");
            return;
        }

        // Verwijder bestaande records
        WorkExperience::truncate();

        // Lees en decode de JSON
        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        // Voeg werkervaringen toe
        foreach ($data as $item) {
            WorkExperience::updateOrCreate(
                [
                    'werkgever' => $item['werkgever'],
                    'functie' => $item['functie'],
                    'startdatum' => $item['startdatum'],
                ],
                [
                    'einddatum' => $item['einddatum'] ?? null,
                    'beschrijving' => $item['beschrijving'],
                ]
            );
        }

        $this->command->info("✅ Werkervaringen succesvol geïmporteerd.");
    }
}
