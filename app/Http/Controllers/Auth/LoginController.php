<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Model\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request)
    {
        if(Auth::guard('web')->attempt(['us_name' => $request->userName, 'password' => $request->userPassword, 'status' => '1'], $request->remember)) {
            return response()->json([
                'status' => true
            ]);
        }  

        return response()->json([
            'status' => $request->remember
        ]);
    }

    public function checkAuth(Request $request)
    {
        $user = User::select('name', 'lastname')->where('id', Auth::user()->id)->first();
        
        return response()->json([
            'user' => $user,
            'status' => true
        ]);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }
    
}
