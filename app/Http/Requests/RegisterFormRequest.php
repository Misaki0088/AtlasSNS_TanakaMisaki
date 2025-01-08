<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    // public function rules()
    // {
    //     return [
    //         'username'  => 'required|between:2,20',
    //         'email'   => 'required|unique:email|between:5,40|email',
    //         'password' => 'required|alpha_num:ascii|between:8,20',
    //         'passwordConfirm'  => 'required|alpha_num:ascii|same:retype_password|between:8,20',
    //     ];
    // }
}
