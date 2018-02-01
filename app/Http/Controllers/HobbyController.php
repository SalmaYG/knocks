<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hobby;
use App\User;
use App\obj;
class HobbyController extends Controller
{
     public function createHobby(Request $request){

    	$newHobby = new Hobby();
    	$newHobby->initialize(
           $request->name
    	);
    	return $newHobby->id;

    }

    public function retriveHobby(Request $request){
       $user = User::find($request->user);
       if(!$user) return 'invalid' ;
       $edus = $user->hobbies()->get();
       $array = [];
       foreach($edus as $edu){
        if(obj::find($edu->object_id)->isAvailable(auth()->user()->id))
          array_push($array, $edu);
       }
       return $array ;
    }
}
