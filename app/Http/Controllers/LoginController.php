<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function eiei()
    {
        return view('admin.login_admin');
    }
}
