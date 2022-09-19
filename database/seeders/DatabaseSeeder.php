<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FeatureSeeder::class,
            PlanSeeder::class,
            PermissionRoleSeeder::class,
            ExamSeeder::class,
            ClassroomSeeder::class,
            SubjectSeeder::class,
            UserSeeder::class,
            ModelHasRoles::class,
            ReferralProgramSeeder::class,
        ]);

    }
}
