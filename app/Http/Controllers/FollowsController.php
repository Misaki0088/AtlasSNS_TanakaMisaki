<?php

namespace App\Http\Controllers;
use App\Models\Follow;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
//フォローしている人の情報取得
    public function followList(){
        $user = auth()->user();
        $user_id = $user->id;
        //フォローしているユーザーのIDを取得
        $follows = Follow::where('following_id', $user_id)->get();
        $plucked = $follows->pluck('followed_id');

        //フォローしているユーザーの情報を取得
        $users = User::whereIn('id',$plucked)->get();

        //フォローしているユーザーの投稿を取得
        $posts = Post::whereIn('user_id', $plucked)->get();

        //ビューにデータを渡す
        return view('follows.followList',['users' => $users,'posts' =>$posts]);

    }
    public function followerList(){
        return view('follows.followerList');
    }


}
