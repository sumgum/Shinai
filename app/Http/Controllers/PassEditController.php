<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassEditController extends Controller
{
    public function show() {
        return view('users.passEdit');
    }
}
