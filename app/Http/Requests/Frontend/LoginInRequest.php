<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class LoginInRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [

            'email'              => ['required','email', 'string',  'max:255'],
            'password'           => ['required','min:8','confirmed','string'],

        ];
    }
    public function messages()
    {
        return [

            'email.required'             => 'Email Field Is Required',
            'email.email'                => 'Email Must Be Valid Email with @ ',
            'email.string'               => 'Email Must Be In String Format',
            'email.max'                  => 'Email Max Length 255',
            'password.required'          => 'Password Field Is Required',
        ];

    }
}
