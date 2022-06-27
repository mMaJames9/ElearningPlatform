<?php

namespace Database\Seeders;

use App\Models\User;
use BaconQrCode\Renderer\Path\Close;
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
        $this->call(PermissionRoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ModelHasRoles::class);
        $this->call(ExamSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(SubjectSeeder::class);

    }
}
