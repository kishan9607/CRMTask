<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }

    public function user()
    {
        return view('user.index');
    }
}
