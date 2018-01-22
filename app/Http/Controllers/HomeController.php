<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Socialite;

class HomeController extends Controller
{
    function signup(Request $request){
    	$this->validate($request,[
    		'email'=>'required|unique:users',
    		'firstname'=>'required|max:120',
    		'lastname'=>'required|max:120',
    		'password'=>'confirmed|required|min:4',
    		'password_confirmation'=>'required'
    	]);
    	$firstname = $request['firstname'];
    	$lastname = $request['lastname'];
    	$email = $request['email'];
    	$password = bcrypt($request['password']);

    	$user = new User();
    	$user->firstname = $firstname;
    	$user->lastname = $lastname;
    	$user->email = $email;
    	$user->password = $password;

    	$user->save();
    	Auth::login($user);

    	return redirect()->route('dashboard');
    }

    function login(Request $request){
    	$this->validate($request,[
    		'email'=>'required',
    		'password'=>'required|min:4'
    	]);
    	$remember = $request['remember'];
    	if(isset($remember)){
    		$rem = true;
    	}
    	else
    		$rem = false;
    	if(Auth::attempt(['email'=>$request['email'] , 'password'=>$request['password']],$rem)){
    		return redirect()->route('dashboard');
    	}
    }

    function dashboard(){
    	return view('dashboard');
    }
    //facebook socialite
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try{
        $FacebookUser = Socialite::driver('facebook')->user();
    }catch(Exception $e){
    	return redirect('/');
    }
        
    	    
        	
        	
           $finduser = User::where('email',$FacebookUser->email)->first();
      //  dd($FacebookUser);
        
			if($finduser){
			
        	Auth::login($FacebookUser);
        	return redirect()->route('dashboard');
        }else{
        	$user = new User;
        	
        	$default = explode(" ",$FacebookUser->name);
        	
        	$user->firstname = $default[0];
        	$user->lastname = $default[1];
        	
        	$user->email =$FacebookUser->email;
        	$user->password = bcrypt(12345);
        	$user->save();

        	Auth::login($FacebookUser);
        	return redirect()->route('dashboard');
        }
        
        //error because of unconfirmed email facebook sent to you the time you created ur facebook account
        
    }
}
