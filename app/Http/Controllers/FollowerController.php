<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $current_user= auth()->user();
        $current_user->followings()->attach($user);

        return redirect()->route('user.show',$user->id)->with('success','Followed successfully!');
    }
    public function unfollow(User $user)
    {
        $current_user= auth()->user();
        $current_user->followings()->detach($user);

        return redirect()->route('user.show',$user->id)->with('success','Unfollowed successfully!');

    }
}
