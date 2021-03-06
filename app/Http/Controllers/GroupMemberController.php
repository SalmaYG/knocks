<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Group_member;

class GroupMemberController extends Controller
{
    public function getGroupMembers(Request $request){
    	$all = Group_member::where('group_id','=',$request->group_id)->get();
    	return $all;
    }
     public function checkUserInGroup(Request $request){
             $ingroup = Group_member::where('group_id','=',$request->group)
             ->where('user_id','=',$request->user)->get();
             if(count($ingroup) > 0){
             	return 'in';
             }
             else{
             	 return 'out';
             }

    }

    
}
