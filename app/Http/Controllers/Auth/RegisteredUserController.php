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
use Illuminate\Support\Facades\Session;


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
        Session::put('username', $request->username);

        return redirect('added');
    }

    public function added(): View
    {
        return view('auth.added');
    }

}
