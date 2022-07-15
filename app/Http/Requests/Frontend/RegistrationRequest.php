<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'first_name'         => ['required'],
            'last_name'          => ['required'],
            'email'              => ['required','email', 'string',  'max:255', 'unique:users'],
            'networklevel'       => ['required'],
            'password'           => ['required','min:8','confirmed','string'],
            'confirm_password'   => ['same:password','required'],
            'timezone'           => ['required'],
            'termsofservice'     => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'email.required'             => 'Email Field Is Required',
            'email.email'                => 'Email Must Be Valid Email with @ ',
            'email.string'               => 'Email Must Be In String Format',
            'email.max'                  => 'Email Max Length 255',
            'first_name.required'        => 'First Name Field Is Required',
            'termsofservice.required'    => 'Terms Of Service Field Is Required',
            'timezone.required'          => 'Time Zone Field Is Required',
            'last_name.required'         => 'Last Name Field Is Required',
            'networklevel.required'      => 'Network Level Field Is Required',
            'networklevel.required'      => 'Network Level Field Is Required',
            'password.required'          => 'Password Field Is Required',
            'password.required'          => 'Password Length Must Be 8 Characters',
            'password.confirmed'         => 'Password  Must Be Confirmed With Confirm Password',
            'confirm_password.required'  => 'Confirm Password  Field Is Required',
            'confirm_password.same'      => 'Confirm Password And  Password Must be Same',
        ];

    }
}
