<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '６にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-19'),
            'updated_at' => new Carbon('2020-01-19'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '５にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-18'),
            'updated_at' => new Carbon('2020-01-18'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '４にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-16'),
            'updated_at' => new Carbon('2020-01-16'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '３にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-11'),
            'updated_at' => new Carbon('2020-01-11'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '２にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2019-12-21'),
            'updated_at' => new Carbon('2019-12-21'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '１にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2018-12-19'),
            'updated_at' => new Carbon('2018-12-19'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 2,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '２にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2019-12-21'),
            'updated_at' => new Carbon('2019-12-21'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 2,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '１にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2018-12-19'),
            'updated_at' => new Carbon('2018-12-19'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 3,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '２にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2019-12-21'),
            'updated_at' => new Carbon('2019-12-21'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 3,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '１にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2018-12-19'),
            'updated_at' => new Carbon('2018-12-19'),
        ]);

        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '６にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-19'),
            'updated_at' => new Carbon('2020-01-19'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '５にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-18'),
            'updated_at' => new Carbon('2020-01-18'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '４にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-16'),
            'updated_at' => new Carbon('2020-01-16'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '３にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-11'),
            'updated_at' => new Carbon('2020-01-11'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '２にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2019-12-21'),
            'updated_at' => new Carbon('2019-12-21'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '１にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2018-12-19'),
            'updated_at' => new Carbon('2018-12-19'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 2,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '２にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2019-12-21'),
            'updated_at' => new Carbon('2019-12-21'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 2,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '１にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2018-12-19'),
            'updated_at' => new Carbon('2018-12-19'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 3,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '２にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2019-12-21'),
            'updated_at' => new Carbon('2019-12-21'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 3,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '１にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2018-12-19'),
            'updated_at' => new Carbon('2018-12-19'),
        ]);

        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '６にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-19'),
            'updated_at' => new Carbon('2020-01-19'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '５にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-18'),
            'updated_at' => new Carbon('2020-01-18'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '４にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-16'),
            'updated_at' => new Carbon('2020-01-16'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '３にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2020-01-11'),
            'updated_at' => new Carbon('2020-01-11'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '２にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2019-12-21'),
            'updated_at' => new Carbon('2019-12-21'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 1,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '１にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2018-12-19'),
            'updated_at' => new Carbon('2018-12-19'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 2,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '２にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2019-12-21'),
            'updated_at' => new Carbon('2019-12-21'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 2,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '１にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2018-12-19'),
            'updated_at' => new Carbon('2018-12-19'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 3,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '２にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => new Carbon('2019-12-21'),
            'updated_at' => new Carbon('2019-12-21'),
        ]);
        DB::table('study_records')->insert([
            'user_id' => 3,
            'study_time' => 1,
            'rest_time' => 1,
            'etc_time' => 1,
            'total_time' => 3,
            'comment' => '１にちめのきろくです！',
            'study_flg' => true,
            'has_comment' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
