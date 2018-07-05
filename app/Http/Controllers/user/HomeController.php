<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\render\ssrclass;

class HomeController extends Controller
{

    use ssrclass;
    
    public function get(Request $request) {
        $ssr = $this->render($request->path());
        return view('user/home', ['ssr' => $ssr]);
    }
}
