<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fav_users')->insert([
            'user_id' => 1,
            'fav_user_id' => 2,
            'fav_flg' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('fav_users')->insert([
            'user_id' => 1,
            'fav_user_id' => 3,
            'fav_flg' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('fav_users')->insert([
            'user_id' => 2,
            'fav_user_id' => 3,
            'fav_flg' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('fav_users')->insert([
            'user_id' => 3,
            'fav_user_id' => 1,
            'fav_flg' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('fav_users')->insert([
            'user_id' => 3,
            'fav_user_id' => 2,
            'fav_flg' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
