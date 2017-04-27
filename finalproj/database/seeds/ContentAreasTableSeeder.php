<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ContentAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content_areas')->insert([
            'cont_name' => 'Big Headline',
            'cont_alias' => 'BigHeadline',
            'cont_desc' => 'This is the section for major articles and stories. 
                            It is configured to be displayed prominently on top of page',
            'disp_order' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);
        DB::table('content_areas')->insert([
            'cont_name' => 'Small Headline',
            'cont_alias' => 'SmallHeadline',
            'cont_desc' => 'This is the section for smaller articles. 
                            It will be displayed below the big headlines but still prominently',
            'disp_order' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);
        DB::table('content_areas')->insert([
            'cont_name' => 'Footer Headline',
            'cont_alias' => 'FooterHeadline',
            'cont_desc' => 'This is the section for minor articles 
                            It will be displayed at bottom of page, in smaller bits',
            'disp_order' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);

    }
}
