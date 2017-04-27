<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Specify here the order that the seeder fils should run
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesUsersTableSeeder::class);

        $this->call(PagesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ContentAreasTableSeeder::class);
        $this->call(CSSSheetsTableSeeder::class);
    }
}
