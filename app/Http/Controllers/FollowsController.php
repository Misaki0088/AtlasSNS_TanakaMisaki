<?php

namespace App\Http\Controllers;
use App\Models\Follow;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        $user = auth()->user();
        $user_id = $user->id;
        $follows = Follow::where('following_id', $user_id)->get();
        $plucked = $follows->pluck('followed_id');
        $users = User::whereIn('id',$plucked)->get();
        $posts = Post::whereIn('user_id', $plucked)->get();
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}
