<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'page_name' => 'Page 1',
            'page_alias' => 'p1',
            'page_desc' => 'Page 1 Welcome Page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);
        DB::table('pages')->insert([
            'page_name' => 'Page 2',
            'page_alias' => 'p2',
            'page_desc' => 'Page 2 Theme A Page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);
        DB::table('pages')->insert([
            'page_name' => 'Page 3',
            'page_alias' => 'p3',
            'page_desc' => 'Page 3 Theme B Page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);
    }
}
