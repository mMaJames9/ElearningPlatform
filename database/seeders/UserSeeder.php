<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Bertrand Emo',
                'email' => 'bertrand2005emo@yahoo.fr',
                'username' => 'bertrand2005em',
                'phone_number' => '+237 690 050 107',
                'email_verified_at' => null,
                'password' => Hash::make('Bonaberi01'),
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
            ],

            [
                'id' => 2,
                'name' => 'Anthony MISSE',
                'email' => 'anthonymisse85@gmail.com',
                'username' => 'm.maj9',
                'phone_number' => '+237 696 638 725',
                'email_verified_at' => null,
                'password' => Hash::make('anthonyjames@1234'),
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
            ],
        ]);
    }
}
