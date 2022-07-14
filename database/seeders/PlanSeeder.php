<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Models\Plan;
use LucasDotVin\Soulbscription\Models\Feature;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;

class PlanSeeder extends Seeder
{
    public function run()
    {

        $academicYear = Plan::create([
            'name'             => 'Academic Year',
            'periodicity_type' => PeriodicityType::Year,
            'periodicity'      => 1,
        ]);

        $unlimitedFeature = Feature::where('name', 'download-documents-unlimited')->first();

        $academicYear->features()->attach($unlimitedFeature);
    }
}
