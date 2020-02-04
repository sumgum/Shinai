<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_details')->insert([
            'user_id' => 1,
            'user_name' => 'sample taro',
            'user_target' => '',
            'prof_image' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('user_details')->insert([
            'user_id' => 2,
            'user_name' => 'sample john',
            'user_target' => '',
            'prof_image' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('user_details')->insert([
            'user_id' => 3,
            'user_name' => 'sample judy',
            'user_target' => '',
            'prof_image' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
