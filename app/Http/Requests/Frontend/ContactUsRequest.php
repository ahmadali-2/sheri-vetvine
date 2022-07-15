<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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

            'firstname'         => ['required'],
            'lastname'          => ['required'],
            'email'             => ['required','email', 'string',  'max:255'],
            'message'           => ['required'],

        ];
    }
    public function messages()
    {
        return [

            'firstname.required'         => 'First Name Field Is Required',
            'lastname.required'          => 'Last Name Field Is Required',
            'email.required'             => 'Email Field Is Required',
            'email.email'                => 'Not a Valid Email',
            'email.string'               => 'Email Must Be In String Format',
            'email.max'                  => 'Email Max Length 255',
            'message.required'           => 'Message Field Is Required',

        ];

    }
}
