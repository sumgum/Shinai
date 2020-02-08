<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfEditController extends Controller
{
    public function show($id) {
        if($id !== Auth::user()->id) {
            redirect(route('mypage.show', Auth::user()->id));
        }
        $user_detail = Auth::user()->userDetail()->first();
        return view('users.profEdit', compact('id', 'user_detail'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'user_name' => 'string|max:20|nullable',
            'user_target' => 'string|max:50|nullable',
            'prof_image' => 'file|image|mimes:jpeg,png,jpg,gif|max:2097152|nullable',
        ]
        );
        $image = $request->prof_image;
        if($request->user_name === null){ $request->replace(['user_name'=>'名無し']);}
        if(Auth::user()->userDetail()->count()>0) {
            // >>>>> 更新処理 >>>>>
            $user_detail = Auth::user()->userDetail()->first();
            if($request->hasFile('prof_image')) {
                // 画像がアップロードされている場合
                $store_path = $image->store('public/image/prof');
                $read_path = str_replace('public/', 'storage/', $store_path);
                Auth::user()->userDetail()->save($user_detail->fill($request->all())->fill(['prof_image' => $read_path]));
            } else {
                // 画像がアップロードされていない場合
                $user_detail->fill($request->all())->save();
            }
            // >>>>> 更新処理終了
        } else {
            // >>>>> 新規登録処理 >>>>>
            if($request->hasFile('prof_image')) {
                // 画像がアップロードされている場合
                $store_path = $request->prof_image->store('public/image/prof');
                $read_path = str_replace('public/', 'storage/', $store_path);
                $user_detail = new UserDetail;
                Auth::user()->userDetail()->save($user_detail->fill($request->all())->fill(['prof_image' => $read_path]));
            } else {
                // 画像がアップロードされていない場合
                $user_detail = new UserDetail;
                Auth::user()->userDetail()->save($user_detail->fill($request->all()));
            }
            // >>>>> 新規登録処理終了 >>>>>
        }
        return redirect()->route('mypage.show', compact('id'));
        // return view('users.study')->with('flash_message', 'プロフィールを編集しました。');
    }

}
