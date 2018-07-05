<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//view
Route::get('/welcome', function () {
    return view('welcome');
});

    //auth
    Route::get('/', [ 'as' => 'user.login', 'uses' => 'Auth\CustomAuthController@get'])->middleware('guest');
    Route::post('/login', [ 'as' => 'user.login.submit', 'uses' => 'Auth\LoginController@login']);
    Route::post('/checkauth', 'Auth\LoginController@checkAuth');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/home', 'user\HomeController@get')->middleware('auth')->name('home');

    Route::get('/admin', 'AdminController@index');
    //
//

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});


// Register
Route::post('/register-save', 'Auth\CustomAuthController@registersave');
Route::post('/check-username', 'Auth\CustomAuthController@checkusername');
Route::post('/check-email', 'Auth\CustomAuthController@checkEmail');
Route::get('/verify/{email}/{token}','Auth\CustomAuthController@sendEmailDone')->name('sendEmailDone');

Route::post('/check-login','Auth\CustomAuthController@checkLogin');

Route::get('/auth/login/facebook', 'Auth\CustomAuthController@facebookAuthRedirect');
Route::get('/auth/login/callback', 'Auth\CustomAuthController@facebookSuccess');

// rest api
Route::post('/get_department_business', 'api\register@department_retrieve');
Route::post('/get_position_business', 'api\register@position_retrieve');
//

//


// Test
Route::get('/test', function () {
    $mytime = Carbon\Carbon::now()->format('YmdHis');
    dd($mytime);
});

Route::get('/test2', 'Auth\CustomAuthController@kuy');
//

?>

