<?php


Route::group(['middleware'=>'web'],function(){
	Route::get('/', function () {
    return view('welcome');
})->name('welcome');
	Route::post('/signup',[
		'as'=>'signup',
		'uses'=>'HomeController@signup',
	]);

	Route::get('/dashboard',[
		'as'=>'dashboard',
		'uses'=>'HomeController@dashboard',
		'middleware'=>'auth',
	]);

	Route::post('/login',[
		'as'=>'login',
		'uses'=>'HomeController@login',
	]);

	Route::get('/register',function(){
		return view('register');
	})->name('register');

	Route::get('login/facebook', 'HomeController@redirectToProvider')->name('facebook');;
	Route::get('login/facebook/callback', 'HomeController@handleProviderCallback');

	//twitter routes
	Route::get('login/twitter', 'TwitterController@redirectToProvider')->name('twitter');
	Route::get('login/twitter/callback', 'TwitterController@handleProviderCallback');
	//google routesGoogleController
	Route::get('login/google', 'GoogleController@redirectToProvider')->name('google');
	Route::get('login/google/callback', 'GoogleController@handleProviderCallback');

	//twitter submit forms
	

	Route::get('dashboard/twitter','TwitterPlatformsController@TwitterUserTimeline')->name('tweets');
	Route::post('dashboard/tweets',[
		'as'=>'post.tweet',
		'uses'=>'TwitterPlatformsController@Tweets',
	]);

	///facebook platform
	Route::get('dashboard/facebook','FacebookPlatformsController@facebook')->name('facebook.platform');

	//password reset routes password.request
	Route::post('/password/reset','ForgotPasswordController@showForm')->name('password.request');
	Route::get('/password/email','ForgotPasswordController@showLinkRequestForm')->name('password.email');
	//Route::get('/password/reset/{token}','ResetPasswordController@showForm')->name('password.reset');
	//Route::post('/password/reset','ResetPasswordController@reset');

	Route::get('/bot','botController@bot')->middleware('verifyBot');
	Route::post('/bot','botController@bot');


});

