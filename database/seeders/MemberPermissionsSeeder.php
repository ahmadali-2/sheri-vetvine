<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_permissions')->insert([
            ['membertype_id' => 1], // Super Admin

            ['membertype_id' => 2], // Public

            ['membertype_id' => 3], // Pet Owner

            ['membertype_id' => 4], // Vet Professional

            ['membertype_id' => 5], // Pet professional

            ['membertype_id' => 6], // Pet Owner Premium

            ['membertype_id' => 7], // Vet Professional Premium

            ['membertype_id' => 8], // Pet professional Premium
        ]);  
    }
}
