<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }

    public function profileUpdate(Request $request)
    {
// dd($request);
$validator = Validator::make($request->all(),[
    'username' => 'required','string','between:2,12',
    'email' => 'required','string','unique:users,email','between:5,40',
    'password' => 'required','string','alpha_num:ascii','between:8,20','confirmed',
    'password_confirmation' => 'required',
    'bio' => 'nullable','string','max:150',
    'IconImage' =>'nullable','mimes:jpg','png','bmp','gif','svg'
]);
if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
}
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // ユーザーの情報を更新
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $bio = $request->input('bio');

        // パスワードを変更する場合のみハッシュ化して更新
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        // 2つ目の処理
        $user->update([
            'username'=> $username,
            'email' => $email,
            'password' => $password,
            'bio' => $bio,
        ]);

        // アイコン画像の処理（画像のアップロード）
        if ($request->hasFile('IconImage')) {
            $image = $request->file('IconImage');

        // ユニークなファイル名を生成
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // 画像を指定のディレクトリに保存
        $imagePath = $image->storeAs('storage/',$imageName);

        // 画像パスをデータベースに保存（必要に応じて）
        $user->icon_image = $imageName; // 必要に応じてカラム名を変更
        }

        // 更新を保存
        $user->save();

         // 更新後にトップページにリダイレクト
        return redirect('/top');
    }
}