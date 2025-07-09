<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/media.json');

        if (! File::exists($path)) {
            $this->command->warn('media.json niet gevonden, seeding overgeslagen.');

            return;
        }

        DB::table('media')->truncate();

        $data = json_decode(File::get($path), true);

        foreach ($data as $item) {
            DB::table('media')->insert([
                // 'id' => $item['id'],
                'model_type' => $item['model_type'],
                'model_id' => $item['model_id'],
                'uuid' => $item['uuid'],
                'collection_name' => $item['collection_name'],
                'name' => $item['name'],
                'file_name' => $item['file_name'],
                'mime_type' => $item['mime_type'],
                'disk' => $item['disk'],
                'conversions_disk' => $item['conversions_disk'],
                'size' => $item['size'],
                'manipulations' => json_encode($item['manipulations']),
                'custom_properties' => json_encode($item['custom_properties']),
                'generated_conversions' => json_encode($item['generated_conversions']),
                'responsive_images' => json_encode($item['responsive_images']),
                'order_column' => $item['order_column'] ?? null,
                'created_at' => $item['created_at'] ?? now(),
                'updated_at' => $item['updated_at'] ?? now(),
            ]);
        }

        $this->command->info('Media succesvol geïmporteerd.');
    }
}
