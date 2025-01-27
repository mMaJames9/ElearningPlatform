<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_roles')->insert([
            [
                'role_id' => 3,
                'model_type' => null,
                'model_id' => 1,
            ],

            [
                'role_id' => 3,
                'model_type' => null,
                'model_id' => 2,
            ],

            [
                'role_id' => 3,
                'model_type' => null,
                'model_id' => 3,
            ],
        ]);
    }
}
