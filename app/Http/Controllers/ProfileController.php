<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }

    public function profileUpdate(Request $request)
    {
// dd($request);
$validator = Validator::make($request->all(),[
    'username' => 'required','string','max:2,12',
    'email' => 'required','string','unique:users,email','max:5,40',
    'password' => 'required','string','alpha_num:ascii','max:8,20','confirmed',
    'password_confirmation' => 'required',
    'bio' => 'string','max:150',
    'IconImage' => 'mimes:jpg','png','bmp','gif','svg',
]);



return redirect('/top');
    }

}
