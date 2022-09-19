<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferralProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('referral_programs')->insert([
            [
                'id' => 1,
                'name' => 'Sign-up Bonus',
                'uri' => 'register',
                'lifetime_minutes' => 7 * 24 * 60,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
