<?php

namespace App\Http\Controllers;

use App\User;
use App\FavUser;
use App\StudyRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function show() {
        $id = Auth::user()->id;
        $study_records = StudyRecord::where('has_comment', 1)
        ->with([
            'favUsers_fav_users'=>function($query) {
                $query
                ->where('user_id', '=', Auth::user()->id);
            },
            'userDetail:user_id,prof_image,user_name'
            ])->orderBy('created_at', 'desc')->get();
        return view('users.timeline', compact('study_records'));
    }

    public function favoriteToggle(Request $request) {
        $user_id = Auth::user()->id;
        $request->validate([
            'fav_user_id' => 'required|integer'
        ]);
        $request_params = $request->all();
        $request_params['user_id'] = $user_id;
        $fav_user_id = $request_params['fav_user_id'];
        $update_record = Auth::user()->favUsers()->where('fav_user_id', $fav_user_id);
        // 既にレコードがある組み合わせか判定
        if($update_record->count() === 0){
            // fav_usersテープルに既存のレコードがないので新規作成する
            // 新規登録の場合Requestのfav_flgをtrueで登録
            $request_params['fav_flg'] = true;
            $favUserRecord = new FavUser;
            Auth::user()->favUsers()->save($favUserRecord->fill($request_params));
        } else {
            // fav_usersテーブルに既存のレコードがあるので更新処理を実行
            $flg = 0;
            $old_flg = $update_record->first()->fav_flg;
            ($old_flg === 0)? $flg = 1: $flg = 0;
            $update_record->update(['fav_flg' => $flg]);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required|integer',
            'user_id' => 'required|integer',
            'comment' => 'string|max:400|nullable',
        ]);
        if($request->user_id !== Auth::user()->id) {
            return redirect('/timeline')->with('flash_message', '不正な操作が行われました');
        }
        $study_id = $request->id;
        StudyRecord::find($study_id)->update(['comment' => $request->comment]);
        return $request->id;
    }
}
