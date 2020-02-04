<?php

namespace App\Http\Controllers;

use App\StudyRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyController extends Controller
{
    public function show(Request $request) {
        return view('users.study', ['header_info' => $request->header_info]);
    }

    public function record(Request $request) {
        $request->validate([
            'study_time' => 'required|integer|between:0,36000000',
            'rest_time' => 'required|integer|between:0,36000000',
            'etc_time' => 'required|integer|between:0,36000000',
            'total_time' => 'integer|between:0,36000000',
            'comment' => 'string|max:400|nullable',
            'study_flg' => 'boolean',
            'has_comment' => 'boolean',
        ]);

        $studyRecord = new StudyRecord;

        Auth::user()->studyRecords()->save($studyRecord->fill($request->all()));
        return route('mypage.show', ['id'=>Auth::user()->id]);
    }
}
