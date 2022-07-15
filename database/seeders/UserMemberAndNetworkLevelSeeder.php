<?php

namespace Database\Seeders;

use App\Models\UserMemberAndNetworkLevel;
use Illuminate\Database\Seeder;

class UserMemberAndNetworkLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserMemberAndNetworkLevel::create([
            'name' => 'Super Admin',
        ]);
        UserMemberAndNetworkLevel::create([
            'name' => 'Veterinary Professional',
        ]);
        UserMemberAndNetworkLevel::create([
            'name' => 'Vet / Vet Tech Student',
        ]);
        UserMemberAndNetworkLevel::create([
            'name' => 'Pet Care Professional',
        ]);
        UserMemberAndNetworkLevel::create([
            'name' => 'Pet Owner',
        ]);
        UserMemberAndNetworkLevel::create([
            'parent_id' => 2,
            'name' => 'Veterinarian',
        ]);
        UserMemberAndNetworkLevel::create([
            'parent_id' => 2,
            'name' => 'Veterinary Specialist',
        ]);
        UserMemberAndNetworkLevel::create([
            'parent_id' => 2,
            'name' => 'Veterinary Technician',
        ]);
        UserMemberAndNetworkLevel::create([
            'parent_id' => 3,
            'name' => 'Veterinary Client Care / Hospital Admin',
        ]);
        UserMemberAndNetworkLevel::create([
            'parent_id' => 3,
            'name' => 'Veterinary Technician Student',
        ]);
        UserMemberAndNetworkLevel::create([
            'parent_id' => 4,
            'name' => 'Trainer / Animal Behavior Consultant',
        ]);
        UserMemberAndNetworkLevel::create([
            'parent_id' => 4,
            'name' => 'Breeder',
        ]);
        UserMemberAndNetworkLevel::create([
            'parent_id' => 4,
            'name' => 'Other Service Provider',
        ]);
        UserMemberAndNetworkLevel::create([
            'parent_id' => 5,
            'name' => 'Pet Owner',
        ]);

    }
}
