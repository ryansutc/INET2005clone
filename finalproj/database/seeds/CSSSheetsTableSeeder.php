<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CSSSheetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('csssheets')->insert([
            'css_name' => 'lightstyle',
            'css_desc' => 'Light Card Layout Style modelled after Al-Jazeera',
            'css_text' => 'table {
                            border-collapse: collapse;
                            /*background-color: #ffc6aa;*/
                            border: 1px solid black;
                            width: 100%;

                            }   
                            
                            th, td {
                                text-align: left;
                                padding: 8px;
                            }
                            thead {
                                background-color: #041E37;
                                color: #CCCCCC;
                            }
                            tbody tr:nth-child(even){background-color: #728ca6}
                            tbody tr:hover {background-color: #aa8f39}
                            
                            
                            .art_title {
                                font-size: large;
                                color: black;
                            }
                            
                            .art_title.bigheadline {
                                font-size: 24px;
                                color: black;
                            }
                            
                            .art_title.smallheadline {
                                font-size: 18px;
                                color: black;
                            }
                            
                            .art_title.footerheadline {
                                font-size: 18px;
                            }
                            
                            
                            
                            .rectangle {
                                width: 80%;
                                height: 400px;
                                min-width: 300px;
                                max-width: 600px;
                                background: goldenrod;
                            }
                            .rectangle-text {
                                display: table-cell;
                                vertical-align: bottom;
                                background-color: #CCCCCC;
                                color: white;
                            }
                            
                            .rectangle-sm {
                                float: left;
                                width: 25%;
                                min-width: 100px;
                                max-width: 200px;
                                height: 160px;
                                background: goldenrod;
                            }
                            
                            h3.MiscStuff {
                                font-size: 12pt;
                                color: black;
                            }
                            
                            h3.BigHeadline {
                                font-size: 24pt;
                            }
                            
                            h3.SmallHeadline {
                                font-size: 18pt;
                            }
                            
                            h3 .FooterHeadline {
                                font-size: 14pt;
                            }
                            .panel.panel-default.BigHeadline {
                            }
                            
                            .panel.panel-default.SmallHeadline {
                            }
                            
                            .panel.panel-default.FooterHeadline {
                            }',
            'css_state' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);

        DB::table('csssheets')->insert([
            'css_name' => 'darkstyle',
            'css_desc' => 'Dark Card Layout Style modelled after Al-Jazeera',
            'css_text' => 'table {
                            border-collapse: collapse;
                            /*background-color: #ffc6aa;*/
                            border: 1px solid black;
                            width: 100%;
                            
                            
                            }
                            
                            th, td {
                                text-align: left;
                                padding: 8px;
                            }
                            thead {
                                background-color: #041E37;
                                color: #CCCCCC;
                            }
                            tbody tr:nth-child(even){background-color: #728ca6}
                            tbody tr:hover {background-color: #aa8f39}
                            
                            
                            .art_title.BigHeadline {
                                font-size: 24px;
                                color: black;
                            }
                            
                            .art_title.SmallHeadline {
                                font-size: 18px;
                                color: black;
                            }
                            
                            .art_title.FooterHeadline {
                                font-size: 18px;
                            }
                            
                            .art_title.MiscStuff {
                                font-size: 14pt;
                            }
                            
                            .rectangle {
                                width: 60%;
                                height: 200px;
                                min-width: 180px;
                                max-width: 300px;
                                background: blanchedalmond;
                            }
                            .rectangle-text {
                                display: table-cell;
                                vertical-align: bottom;
                                background-color: #CCCCCC;
                                color: white;
                            }
                            
                            .rectangle-sm {
                                float: left;
                                width: 25%;
                                min-width: 100px;
                                max-width: 200px;
                                height: 160px;
                                background: blanchedalmond;
                                display: none
                            }
                            
                            h3.MiscStuff {
                                font-size: 12pt;
                                color: black;
                            }
                            
                            h3.BigHeadline {
                                font-size: 20pt;
                            }
                            
                            h3.SmallHeadline {
                                font-size: 16pt;
                            }
                            
                            h3.FooterHeadline {
                                font-size: 12pt;
                            }
                            .panel.panel-default.BigHeadline {
                                background-color: #101010;
                            }
                            
                            .panel.panel-default.SmallHeadline {
                                background-color: #101010
                            }
                            
                            .panel.panel-default.FooterHeadline {
                                background-color: #101010
                            }
                            ',
            'css_state' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);

    }
}
