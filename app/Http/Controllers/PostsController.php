<?php

namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

public function index()
    {
        $posts = Post::all();
        return view('posts.index');
    }

public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'post' => ['required','string','between:1,150'],
            'created_at' => 'required|string',
        ]);
        return view('posts.index');
    }
}
