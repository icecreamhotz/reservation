<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class register extends Controller
{
    public function department_retrieve()
    {
        $department = \App\Department::all();
        return response()->json(['department' => $department]);
    }

    public function position_retrieve(Request $request)
    {
        $position = \App\Position::where('dept_id', $request->sendId)
                    ->get();
        return response()->json(['position' => $position]);
    }
}
