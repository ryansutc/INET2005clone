<?php

use Illuminate\Database\Seeder;

class RolesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles for Ryan S user
        DB::table('role_user')->insert([
            'role_id' => DB::table('roles')->where('role_desc', 'Admin')->first()->id,
            'user_id' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);
        DB::table('role_user')->insert([
            'role_id' => DB::table('roles')->where('role_desc', 'Edit')->first()->id,
            'user_id' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);
        DB::table('role_user')->insert([
            'role_id' => DB::table('roles')->where('role_desc', 'Auth')->first()->id,
            'user_id' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);
        //Role for Editor Guy
        DB::table('role_user')->insert([
            'role_id' => DB::table('roles')->where('role_desc', 'Edit')->first()->id,
            'user_id' => DB::table('users')->where('name', 'Editor Guy')->first()->id,
        ]);

        //Role for Author Guy
        DB::table('role_user')->insert([
            'role_id' => DB::table('roles')->where('role_desc', 'Auth')->first()->id,
            'user_id' => DB::table('users')->where('name', 'Author Guy')->first()->id,
        ]);

        //Role for Admin Guy
        DB::table('role_user')->insert([
            'role_id' => DB::table('roles')->where('role_desc', 'Admin')->first()->id,
            'user_id' => DB::table('users')->where('name', 'Admin Guy')->first()->id,
        ]);

    }
}
