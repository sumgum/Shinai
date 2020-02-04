<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function show() {
        return view('users.withdraw');
    }

    public function withdraw() {
        $id = Auth::user()->id;
        $users = DB::table('users')->where('id', $id);
        ($users->exists())&&$users->delete();
        return view('free.top');
    }
}
