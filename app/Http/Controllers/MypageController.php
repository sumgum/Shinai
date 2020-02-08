<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class MypageController extends Controller
{
    public function show($id) {
        if(!ctype_digit($id)) {
            return redirect('/timeline')->with('warn_message', '不正な操作が行われました');
        }
        if(DB::table('users')->where('id', $id)->doesntExist()) {
            return redirect('/timeline')->with('warn_message', '不正な操作が行われました');
        }
        // >>>>> 学習記録集計処理開始 >>>>>
        $mode = array(
            'total' => 0,
            'study' => 1,
            'rest' => 2,
            'etc' => 3,
        );
        $data = array(
            'study_day' => 0,
            'rest_day' => 0,
            'etc_day' => 0,
        );
        // ログインユーザーのstudyRecordsを取得
        $study_records = User::find($id)->studyRecords();
        // 今日、今週、今月の期間を算出
        $start_of_month = Carbon::now()->startOfMonth();
        $end_of_month = Carbon::now()->endOfMonth();
        $start_of_week = Carbon::now()->startOfWeek();
        $end_of_week = Carbon::now()->endOfWeek();
        $start_of_day = Carbon::now()->startOfDay();
        $end_of_day = Carbon::now()->endOfDay();
        // 期間ごとのレコードを取得
        $monthly_study_records = $study_records->dayGreaterThan($start_of_month)->dayLessThan($end_of_month)->get();
        $weekly_study_records = $study_records->dayGreaterThan($start_of_week)->dayLessThan($end_of_week)->get();
        $daily_study_records = $study_records->dayGreaterThan($start_of_day)->dayLessThan($end_of_day)->get();

        $today_study_arr = self::totalizeStudyRecords($daily_study_records, $mode['study']);
        $today_rest_arr = self::totalizeStudyRecords($daily_study_records, $mode['rest']);
        $today_etc_arr = self::totalizeStudyRecords($daily_study_records, $mode['etc']);
        $this_week_study_arr = self::totalizeStudyRecords($weekly_study_records, $mode['study']);
        $this_week_rest_arr = self::totalizeStudyRecords($weekly_study_records, $mode['rest']);
        $this_week_etc_arr = self::totalizeStudyRecords($weekly_study_records, $mode['etc']);
        $this_month_study_arr = self::totalizeStudyRecords($monthly_study_records, $mode['study']);
        $this_month_rest_arr = self::totalizeStudyRecords($monthly_study_records, $mode['rest']);
        $this_month_etc_arr = self::totalizeStudyRecords($monthly_study_records, $mode['etc']);

        $today_study = self::createTimeFormat(
            $today_study_arr['hour'], $today_study_arr['min'], $today_study_arr['sec']
        );
        $today_rest = self::createTimeFormat(
            $today_rest_arr['hour'], $today_rest_arr['min'], $today_rest_arr['sec']
        );
        $today_etc = self::createTimeFormat(
            $today_etc_arr['hour'], $today_etc_arr['min'], $today_etc_arr['sec']
        );
        $this_week_study = self::createTimeFormat(
            $this_week_study_arr['hour'], $this_week_study_arr['min'], $this_week_study_arr['sec']
        );
        $this_week_rest = self::createTimeFormat(
            $this_week_rest_arr['hour'], $this_week_rest_arr['min'], $this_week_rest_arr['sec']
        );
        $this_week_etc = self::createTimeFormat(
            $this_week_etc_arr['hour'], $this_week_etc_arr['min'], $this_week_etc_arr['sec']
        );
        $this_month_study = self::createTimeFormat(
            $this_month_study_arr['hour'], $this_month_study_arr['min'], $this_month_study_arr['sec']
        );
        $this_month_rest = self::createTimeFormat(
            $this_month_rest_arr['hour'], $this_month_rest_arr['min'], $this_month_rest_arr['sec']
        );
        $this_month_etc = self::createTimeFormat(
            $this_month_etc_arr['hour'], $this_month_etc_arr['min'], $this_month_etc_arr['sec']
        );
        // <<<<< 学習処理集計処理終了 <<<<<
        // >>>>> ユーザー詳細情報取得 >>>>>
        $user_detail = User::find($id)->userDetail()->first();

        if(!is_null($user_detail)) {
            $user_details = [
                'prof_image' => $user_detail->prof_image,
                'user_name' => $user_detail->user_name,
                'user_target' => $user_detail->user_target
            ];
        } else {
            $user_details = [
                'prof_image' => "",
                'user_name' => "",
                'user_target' => ""
            ];
        }

        return view('users.mypage', compact(
            'id',
            'today_study', 'today_rest', 'today_etc',
            'this_week_study', 'this_week_rest', 'this_week_etc',
            'this_month_study', 'this_month_rest', 'this_month_etc',
            'user_details'
        ));
    }

    // 学習記録を集計して、時間・分・秒を配列形式で返す
    public function totalizeStudyRecords($records, $mode) {
        $sec = 0;
        $min = 0;
        $hour = 0;
        $total = 0;
        // レコードの集計
        switch($mode) {
            case $mode === 0:
                foreach($records as $record) {
                    $total += $record->total_time;
                }
                break;
            case $mode === 1:
                foreach($records as $record) {
                    $total += $record->study_time;
                }
                break;
            case $mode === 2:
                foreach($records as $record) {
                    $total += $record->rest_time;
                }
                break;
            case $mode === 3:
                foreach($records as $record) {
                    $total += $record->etc_time;
                }
                break;
        }
        $hour = floor($total / 3600);
        $min = floor(($total % 3600) / 60);
        $sec = ($total % 3600) % 60;
        $arr = array(
            'hour' => $hour,
            'min' => $min,
            'sec' => $sec,
        );
        return $arr;
    }

    // 時間フォーマット作成
    public function createTimeFormat($hour, $min, $sec) {
        if (strlen($min) < 2){ $min = "0" . $min;}
        if (strlen($sec) < 2){ $sec = "0" . $sec;}
        return $hour . ":" . $min . ":" . $sec;
    }

}
