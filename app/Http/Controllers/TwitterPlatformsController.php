<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Twitter;
use File;
use Facebook;


class TwitterPlatformsController extends Controller
{
    //
    private $count = 10;
 	private $format ='array';

 	//
 	 function TwitterUserTimeline(){
 	$data = Twitter::getUserTimeline(['count'=>$this->count,'format'=>$this->format]);
		return view('platforms.twitter',['data'=>$data]);
 	}
 

 

 //
 function Tweets(Request $request){
 	$this->validate($request,[
 		'tweet'=>'required'
 	]);
 	$newTweet = ['status' => $request->tweet];

 	if(!empty($request['images'])){
 		foreach($request['images'] as $key => $value){
 			$uploadMedia = Twitter::uploadMedia(['media'=> File::get($value->getRealPath())]);

 			if(!empty($uploadMedia)){
 				$newTweet['media_ids'][$uploadMedia->media_id_string] = $uploadMedia->media_id_string;
 			}
 		}
 	}
 	
 	$twitter = Twitter::postTweet($newTweet);
 	
 	return back();

 }
}
