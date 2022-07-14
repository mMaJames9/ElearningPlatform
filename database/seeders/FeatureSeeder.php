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
            'consumable'       => false,
            'name'             => 'download-documents-unlimited',
        ]);
    }
}
