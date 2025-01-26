<?php

namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{

public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts'=>$posts]);
    }

public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'post' => 'required','string','between:1,150',
            'created_at' => 'required','string',
        ]);
        return view('posts.index');
    }


    public function tweet(Request $request)
    {
        // dd($request);
        // バリデート設定
        $request -> validate([
        'post' => 'string','between:1,150',
        ]);

        $post = $request->input('tweet');
// 一つの投稿に必要なもの且つ、毎回の投稿に必要なもの
        Post::insert([
        'user_id' => Auth::id(),
        'post' => $post,
        ]);

        return redirect('/top');
    }

// 削除機能
    public function delete($post)
    {
        post::where('post', $post)->delete();
        return redirect('/top');
    }
}
