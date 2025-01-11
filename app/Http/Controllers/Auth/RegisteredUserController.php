<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'username' => ['required', 'between:2,20'],
            'email' => ['required','unique:users,email','between:5,40','email'],
            'password' => ['required','alpha_num:ascii','between:8,20','confirmed'],
            'password_confirmation'  => ['required'],

            ['username.required' => 'ユーザーネームは必須項目です。',
                'mail.required' => 'メールアドレスは必須項目です。',
                'mail.email' => 'メールアドレスを正しく入力してください。',
                'mail.unique' => 'このメールアドレスは既に使われています。',
                'password.required' => 'パスワードは必須項目です。',
                'password.min' => 'パスワードは8文字以上20文字以内で入力してください。',
                'password.confirmed'=> '確認用パスワードが一致しません。',
                'password_confirmation.required' => '確認用パスワードは必須項目です。',
                ],
    ]);

        if ($validator->fails()) {
            return redirect('register')
            ->withErrors($validator)
            ->withInput();
        }

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('added');
    }

    public function added(): View
    {
        return view('auth.added');
    }
}
