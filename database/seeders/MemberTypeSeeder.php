<?php

namespace Database\Seeders;

use App\Models\MemberTypes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_types')->insert([
            ['member_type' => 'Super Admin'],

            ['member_type' => 'Public'],

            ['member_type' => 'Pet Owner'],

            ['member_type' => 'Vet Professional'],

            ['member_type' => 'Pet Professional'],

            ['member_type' => 'Pet Owner Premium'],

            ['member_type' => 'Vet Professional Premium'],

            ['member_type' => 'Pet Professional Premium'],
        ]);
    }
}
