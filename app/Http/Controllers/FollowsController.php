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
        $posts = Post::whereIn('user_id', $plucked)->orderBy('created_at','desc')->get();

        //ビューにデータを渡す
        return view('follows.followList',['users' => $users,'posts' =>$posts]);

    }
    public function followerList(){
        $user = auth()->user();
        $user_id = $user->id;
        //フォローされているユーザーのIDを取得
        $followers = Follow::where('followed_id', $user_id)->get();
        $plucked = $followers->pluck('following_id');

        //フォローされているユーザーの情報を取得
        $users = User::whereIn('id',$plucked)->get();

        //フォローされているユーザーの投稿を取得
        $posts = Post::whereIn('user_id', $plucked)->orderBy('created_at','desc')->get();

        //ビューにデータを渡す
        return view('follows.followerList',['users' => $users,'posts' =>$posts]);
    }


}

