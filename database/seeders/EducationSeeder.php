<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/education.json');

        if (!File::exists($path)) {
            return;
        }

        // Verwijder alle bestaande records
        DB::table('education')->truncate();

        // Laad nieuwe data in
        $data = json_decode(File::get($path), true);

        foreach ($data as $item) {
            DB::table('education')->insert([
                'id' => $item['id'],
                'opleiding' => $item['opleiding'],
                'instituut' => $item['instituut'],
                'startdatum' => $item['startdatum'],
                'einddatum' => $item['einddatum'] ?? null,
                'beschrijving' => $item['beschrijving'],
                'created_at' => $item['created_at'] ?? now(),
                'updated_at' => $item['updated_at'] ?? now(),
            ]);
        }
    }
}
