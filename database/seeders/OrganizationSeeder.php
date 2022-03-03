<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime = Carbon::now();
        $data = [
            [
                'organization_type_id' => 1,
                'organization_name' => 'PUP',
                'organization_acronym' => 'PUP',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'pup',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 1,
                'organization_name' => 'Philippine Association of Students in Office Administration',
                'organization_acronym' => 'PASOA',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'pasoa',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 1,
                'organization_name' => 'Computer Society',
                'organization_acronym' => 'CS',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'ComputerSociety',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 1,
                'organization_name' => 'Association of Electronics and Communications Engineering Students',
                'organization_acronym' => 'AECES',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'AECES',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 1,
                'organization_name' => 'Junior Philippine Society of Mechanical Engineers',
                'organization_acronym' => 'jpsme',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'jpsme',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 1,
                'organization_name' => 'Junior Philippine Institute of Accountants',
                'organization_acronym' => 'jpia',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'jpia',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 1,
                'organization_name' => 'Mentors Society',
                'organization_acronym' => 'mentors',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'mentors',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 1,
                'organization_name' => 'Junior Marketing Association',
                'organization_acronym' => 'jma',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'jma',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 1,
                'organization_name' => 'Junior People Management Association of the Philippines',
                'organization_acronym' => 'jpmap',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'jpmap',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 2,
                'organization_name' => 'Central Student Council',
                'organization_acronym' => 'csc',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'csc',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 2,
                'organization_name' => 'PUPukaw',
                'organization_acronym' => 'PUPukaw',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'pupukaw',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 2,
                'organization_name' => 'Emergency Response Group',
                'organization_acronym' => 'erg',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'erg',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
            [
                'organization_type_id' => 2,
                'organization_name' => 'The Chronicler',
                'organization_acronym' => 'The Chronicler',
                'organization_details' => '...',
                'organization_primary_color' => '#1bbede',
                'organization_secondary_color' => '#1bbede',
                'organization_tertiary_color' => '#1bbede',
                'organization_slug' => 'the-chronicler',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'status' => 1,
            ],
        ];
        DB::table('organizations')->insert($data);
    }
    }
}
