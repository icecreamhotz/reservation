<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\verifyEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\render\ssrclass;
use Socialize;
use Redirect;
use Input;
use Mail;

class CustomAuthController extends Controller
{
    // Register form
    use ssrclass;

    public function get(Request $request) {
        $ssr = $this->render($request->path());
        return view('authentication/index', ['ssr' => $ssr]);
    }

    public function registersave(Request $request)
    {
        $user = new User;

        $user->us_name = $request->username;
        $user->password = bcrypt($request->password);
        $user->name = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;

        // phone number
        $tel_number = $request->phoneone.$request->phonetwo.$request->phonethree;

        $user->tel = $tel_number;
        $user->birthday = $request->birthday;
        $user->email = $request->email;
        $user->dept_id = $request->depts;
        $user->pos_id = $request->pos;
        $user->remember_token = Str::random(40);

        $this->sendEmail($user); // send email for verify

        $user->save();

        return response()->json(['regis_success' => 'You are registed successfully, Please check your email to verify']);
    }

    //

    // Email verify

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }
    
    public function sendEmailDone($email,$token)
    {
        $verifiedStatus = 'User not found !!!';

        $user = User::where([
            'email' => $email,
            'remember_token' => $token
            ])->first();

        $verified = $this->checkEmailAndStatusForLoginFacebook($email);

        // ยืนยันตัวตนไปแล้ว for status
        if($verified || $user) 
        {
            $verifiedStatus = 'Verified successfull !!!';
        }

        // ยังไม่ได้ยืนยันตัวตนหรือไม่มีตัวตน
        if($user) 
        {
            DB::table('users')
                ->where('email', $email)
                ->where('remember_token', $token)
                ->update(['status' => '1', 'remember_token' => null]);
            $verifiedStatus = 'Verified successfull !!!';
        }

        return view('email.verifyWarning')->with('verified', $verifiedStatus);
    }
    
    //

    // Check auth user all data

    public function checkusername(Request $request) 
    {
        $data = DB::table('users')->where('us_name', $request->sendUser)->first();
        if($data)
        {
            return response()->json([
                'status' => false,
                'msg' => 'Username is exists , Please change your username'
            ]);
        }
        return response()->json([
            'status' => true,
            'msg' => 'Perfect , Can use this username'
        ]);
    }

    public function checkEmailAndStatusForLoginFacebook($email)
    {
        return User::where(['email' => $email ,'status' => '1'])->first();
    }

    public function checkEmailFromDatabase($email)
    {
        return User::where('email', $email)->first();
    }

    public function checkEmail(Request $request) 
    {
        if($this->checkEmailFromDatabase($request->sendUser))
        {
            return response()->json([
                'status' => false,
                'msg' => 'Email is exists , Please change your Email'
            ]);
        }
        return response()->json([
            'status' => true,
            'msg' => 'Perfect , Can use this Email'
        ]);
    }

    public function checkLogin(Request $request) 
    {
        if(Auth::attempt(['email' => $request->userName, 'password' => $request->userPassword]))
        {
            return response()->json([
                'status' => true,
                'msg' => 'Welcome Guy'
            ]);
        }

        return response()->json([
            'status' => false,
            'msg' => 'Not welcome'
        ]);
    }

    ///

    // Login with Facebook
    public function facebookAuthRedirect()
    {
        return Socialize::with('facebook')->redirect();
    }

    public function facebookSuccess()
    {
        $provider = Socialize::with('facebook');
        // user object
        $user = $provider->stateless()->user();

        $credential = $this->checkCredentialFacebook($user->email);
        if($credential)
        {
            Auth::guard('web')->login($credential);
            return redirect()->intended(route('home'));
        }

        if(Input::has('code')) 
        {
            //set variable from user object
            $user_id = $user->id; // user id
            $splitName = explode(' ', $user->name, 2); //split name and last name
            $user_name = $splitName[0]; // user name
            $user_lastname = !empty($splitName[1]) ? $splitName[1] : ''; // user lastname
            $user_email = $user->email; // user email
            $user_image_url = $user->avatar; // user image url
            $emailStatus = $this->checkEmailAndStatusForLoginFacebook($user_email); // return status verified

            // create filename user image and save to db
            $timeNow = Carbon::now()->format('YmdHis');
            $fileName = $user_id.$timeNow.'.jpg'; // filename after upload
            $this->saveImageFromFacebookProfile($fileName, $user_image_url);
            //

            if(!$emailStatus) // if have not email or have email and status not verifed 
            {
                $findEmail = User::where('email', $user_email)->first();

                if($findEmail)
                {
                    $findEmail->delete();
                }

                $addUser = new User;
                $addUser->email = $user_email;
                $addUser->name = $user_name;
                $addUser->lastname = $user_lastname;
                $addUser->provider = '2';
                $addUser->provider_id = $user_id;
                $addUser->avatar = $fileName;
                $addUser->status = '1'; 
                $addUser->save();
            } else {
                User::where('email', $user_email)->update([
                    'provider' => '2',
                    'provider_id' => $user_id,
                    'avatar' => $fileName,
                ]);
            }
        $credential = $this->checkCredentialFacebook($user->email);
        if($credential)
        {
            Auth::guard('web')->login($credential);
            return redirect()->intended(route('home'));
        }
        return redirect()->route('/');
        }
    }

    public function checkCredentialFacebook($email)
    {
        $checkCredential = User::where(['email' => $email,'provider' => '2'])->first();
        return $checkCredential;
    }


    public function saveImageFromFacebookProfile($fileName, $url)
    {
        $img = file_get_contents($url);
        $slider_static_url = Storage::disk('custom')->put($fileName, $img);
    }

    ///

}
