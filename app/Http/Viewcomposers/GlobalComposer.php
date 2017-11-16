<?php
/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 16/11/2017
 * Time: 21:42
 */

namespace App\Http\Viewcomposers;


use App\Friends;
use App\User;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class GlobalComposer
{

    public function compose(View $view)
    {
        $myID = Auth::id();
        $friendIDS = Friends::where(['user_id' => $myID, 'follow' => true])->pluck('friend_id');
        $followerIDS = Friends::where(['friend_id' => $myID, 'follow' => true])->pluck('user_id');
        $followers = User::all()->whereIn('id',$followerIDS)->whereNotIn('id',$friendIDS)->sortBy('firstname');
        $view->with('notifications', $followers);
    }
}