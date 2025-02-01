<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{

    public function search(Request $request)
    {

        $keyword = $request->input('keyword');
        if(!empty($keyword)){
// 変数（箱）＝箱の中身（検索する方法）User←Model
// 「usersテーブルのusernameカラムからあいまい検索し、検索にヒットしたレコードを取得」
// $users=User::all(←ドルusersって名前の表記でUserテーブルの全てのことだよって記述)
        $users = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
        $users = User::all();
        }
        return view('users.search',['users'=>$users]);
    }
}