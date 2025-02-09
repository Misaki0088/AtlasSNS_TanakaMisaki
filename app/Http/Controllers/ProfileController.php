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
        User::where('username', $username)->update([
            'email' => $email,
            'password' => $password,
            'bio' => $bio,
        ]);

        // アイコン画像の処理（画像のアップロード）
        if ($request->hasFile('IconImage')) {
            // アップロードされた画像をストレージに保存
            $imagePath = $request->file('IconImage')->store('profile_images', 'public');
            $user->IconImage = $imagePath;  // 画像のパスを保存
        }
        // 更新を保存
        $user->save();

         // 更新後にトップページにリダイレクト
        return redirect('/top');
    }
}