<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;

class GoogleController extends Controller
{
    //
     public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from twitter.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
      
     try{
         $googleUser = Socialite::driver('google')->stateless()->user();
    }catch(Exception $e){
    	return redirect('login/google');
    }

        // $user->token;

          $finduser = User::where('email',$googleUser->email)->first();
      //  dd($googleUser);
        
			if($finduser){
			
        	Auth::login($googleUser);
        	return redirect()->route('dashboard');
        }else{
        	$user = new User;
        	
        	$default = explode(" ",$googleUser->name);
        	
        	$user->firstname = $default[0];
        	$user->lastname = $default[1];
        	
        	$user->email =$googleUser->email;
        	$user->password = bcrypt(12345);
        	$user->save();

        	Auth::login($googleUser);
        	return redirect()->route('dashboard');
        }
        



    ///
}

}
