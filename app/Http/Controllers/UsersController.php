<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{

    public function search(Request $request)
    {

        $keyword = $request->input('keyword');
        $currentUserId = auth()->id();
        if(!empty($keyword)){
// 変数（箱）＝箱の中身（検索する方法）User←Model
// 「usersテーブルのusernameカラムからあいまい検索し、検索にヒットしたレコードを取得」
// $users=User::all(←ドルusersって名前の表記でUserテーブルの全てのことだよって記述)
        $users = User::where('username','like', '%'.$keyword.'%')
                    ->where('id', '!=', $currentUserId)// 自分を除外
                    ->get();
        }else{
        $users = User::where('id', '!=', $currentUserId)  // 自分を除外
        ->get();
        }
        return view('users.search',['users'=>$users]);
    }

// フォロー
    public function follows($id)
    {
    $user = auth()->user();
// フォローしているか
    $is_following = $user->isFollowing($id);//isFollowingはuser.phpのメソッド名
    if(!$is_following) {
// フォローしていなければフォローする
        $user->follow($id);//フォロー追加するためのメソッドのメソッド名がくる→follow
        return back();
    }
    }

// フォロー解除
    public function unfollows($id)
    {
    $user = auth()->user();
// フォローしているか
    $is_followed= $user->isFollowing($id);
    if($is_followed) {
// フォローしていればフォローを解除する
    $user->unfollow($id);
    return back();
    }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('profile', [
            'user' => $user,
            'followersCount' => $user->getFollowersCount(),
            'followingCount' => $user->getFollowingCount(),
        ]);
    }
}
