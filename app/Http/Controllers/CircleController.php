<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Circle;
use App\Circle_member;
use App\User;


class CircleController extends Controller
{
    public function create (Request $request){
      $request->validate([
        'name' => 'required' ,

      ]);
      if(auth()->user()->hasCircle($request->name))
      return 'already_exists';
      $circle = new Circle();
      $circle->initialize($request->name, json_encode($request->icon));
      return 'done';
    }
      public function view (Request $request){
        $circle = Circle::find($request->id);
        if(isset($circle) && $circle != null && $circle->count() == 0)
          return 'not_exist';
          $circle['members'] = Circle_member::where('circle_id' , '=' , $circle->id)->get();
          // foreach($circle['members'] as $mem){
          //   $mem['data'] = User::find($mem->user_id);
          // }
        return $circle;

    }
      public function retrive(Request $request){

      $request->validate([
        'circle' =>'required'
      ]);

      $circle = Circle::find($request->circle);
      if($circle->user_id != auth()->user()->id) return 'invalid' ;
      else return $circle->retriveCircle();

    }



}
