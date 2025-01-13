<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if(!empty($keyword)){
        $users = search::where('like', '%'.$keyword.'%')->get();
        }else{
        $users = username::all();
        return view('users.search');
        }
    }
}
