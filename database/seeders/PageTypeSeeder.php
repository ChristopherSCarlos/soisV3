<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PageTypeSeeder extends Seeder
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
                'page_types_id' => 1,
                'page_type' => 'system page',
                'page_description' => 'This page type is used for the system pages the system is using',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'page_types_id' => 2,
                'page_type' => 'news',
                'page_description' => 'This page type is used for the news page',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'page_types_id' => 3,
                'page_type' => 'announcement',
                'page_description' => 'This page type is used for the announcement page',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'page_types_id' => 4,
                'page_type' => 'organizations',
                'page_description' => 'This page type is used for the organizations page',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'page_types_id' => 5,
                'page_type' => 'default interfaces',
                'page_description' => 'This page type is used for the default interfaces page',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
        ];
        DB::table('asset_types')->insert($data);
    }
}
