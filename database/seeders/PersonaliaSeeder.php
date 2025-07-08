<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personalia;
use Illuminate\Support\Facades\File;

class PersonaliaSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/personalia.json');

        if (!File::exists($path)) {
            $this->command->warn("Bestand {$path} bestaat niet, seeder overgeslagen.");
            return;
        }

        // Leegmaken van de bestaande data
        Personalia::truncate();

        // JSON inladen
        $data = json_decode(File::get($path), true);

        // Records toevoegen
        foreach ($data as $item) {
            Personalia::create([
                'key' => $item['key'],
                'value' => $item['value'],
                'hidden' => $item['hidden'],
                'icon' => $item['icon'],
            ]);
        }

        $this->command->info(count($data) . ' personalia-records geïmporteerd.');
    }
}
