<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Models\Feature;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;

class FeatureSeeder extends Seeder
{
    public function run()
    {
        Feature::create([
            'consumable'       => true,
            'name'             => 'download-documents-limited',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 10,
        ]);

        Feature::create([
            'consumable'       => false,
            'name'             => 'download-documents-unlimited',
        ]);
    }
}
