<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordRequest extends FormRequest
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
            'current_password'                   => ['required'],
            'password'                           => ['required'],
            'confirmpassword'                    => ['required', 'same:password'],
        ];
    }
    public function messages()
    {
        return [
            'current_password.required'                   => 'Current Password Field Is Required',
            'password.required'                           => 'Password Field Is Required',
            'confirmpassword.required'                    => 'Confirm Password Field Is Required',
            'confirmpassword.same'                        => 'Confirm Password Field Does Not Match',
        ];

    }
}
