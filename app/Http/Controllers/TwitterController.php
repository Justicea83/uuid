<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
use Twitter;
use File;
use Facebook;

class TwitterController extends Controller
{
     public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from twitter.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
      
     try{
         $twitterUser = Socialite::driver('twitter')->user();
    }catch(Exception $e){
    	return redirect('login/twitter');
    }

        // $user->token;

          $finduser = User::where('email',$twitterUser->email)->first();
      //  dd($twitterUser);
        
			if($finduser){
			
        	Auth::login($twitterUser->email);
        	return redirect()->route('dashboard');
        }else{
        	$user = new User;
        	
        	$default = explode(" ",$twitterUser->name);
        	
        	$user->firstname = $default[0];
        	$user->lastname = $default[1];
        	
        	$user->email =$twitterUser->email;
        	$user->password = bcrypt(12345);
        	$user->save();

        	Auth::login($twitterUser->email);
        	return redirect()->route('dashboard');
        }
        

//////
 }
 



  



}

