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
        $users = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
        $users = User::all();
        return view('users.search');
        }
    }
}
