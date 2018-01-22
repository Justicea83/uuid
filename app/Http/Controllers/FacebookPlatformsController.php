<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use File;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;


class FacebookPlatformsController extends Controller
{
    //

    
   public function facebook(LaravelFacebookSdk $fb){
  //me?fields=id,name
 try {
  $response = $fb->get('/me?fields=id,name,friends,likes', 'EAAHri6Lqx04BAEWyWG4VZCRHe7iFKHPrim92TfwpcqAuRxKH41Ha06aeg225vH4mxZCZA6jQ3kcXc6bIGP7RILfjMfcoSRDGhbQEFsYzzOskVhOSHdrUtZAzcsU7WXZB68q0xOShdibtnGCO1HNds20IXaBh6siTv3vdPG3fewQpFsHn3mVniW9zFi298TZBwur1YWuJZAqnQZDZD');
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  dd($e->getMessage());
}

        $userNode = $response->getGraphUser();
		$friends = $userNode['likes'];
 		return view('platforms.facebook',['FacebookUser'=>$userNode,'friends'=>$friends]);
   
}

}
