<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    //
    public function index()
    {

        $user_id = $request->input('user_id');
        $post = $request->input('post');
        $created_at = $request->input('created_at');
        $updated_at = $request->input('updated_at');
        post::index([
            'user_id' => $user_id,
            'post' => $post,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ]);

        return view('/top');

    }
}
