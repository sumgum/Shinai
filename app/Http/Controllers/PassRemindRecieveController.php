<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassRemindRecieveController extends Controller
{
    public function show() {
        return view('users.passRemindRecieve');
    }
}
