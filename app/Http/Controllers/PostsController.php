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
            'post' => 'required','string','max:1,150',
            'created_at' => 'required','string',
        ]);
        return view('posts.index');
    }


    public function tweet(Request $request)
    {
        // dd($request);
        // バリデート設定
        $request -> validate([
        'post' => 'string','max:1,150',
        ]);

        $post = $request->input('tweet');
// 一つの投稿に必要なもの且つ、毎回の投稿に必要なもの
 //Postモデル（postテーブル）からレコード情報を取得
        Post::insert([
        'user_id' => Auth::id(),
        'post' => $post,
        ]);

        return redirect('/top');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id); // IDで投稿を検索、存在しない場合は404エラー
        return view('posts.edit', ['post' => $post]); // 編集用フォームを表示
    }

    public function update(Request $request, $id)
    {
        // バリデーション
        $validated = $request->validate([
            'post' => 'required','string','max:150', // 投稿内容が必須で、最大150文字
        ]);

        // 投稿をIDで検索
        $post = Post::findOrFail($id);

        // 投稿内容を更新
        $post->post = $request->input('post');
        $post->save(); // 保存

        // 更新後、トップページや一覧ページにリダイレクト
        return redirect('/top');
    }

// 削除機能
    public function delete($post)
    {
        // dd($post);
        Post::where('id', $post)->delete();
        return redirect('/top');
    }



// 「フォローしているユーザー」+「自分自身」の投稿を取得したい場合
    public function timeline() {
        $posts = Post::query()->whereIn('user_id', User::users()->follows()->pluck('followed_id'))->orWhere('user_id', User::users()->id)->latest()->post();
        return view('posts.timeline')->with([
            'posts' => $posts,
            ]);
    }
}
