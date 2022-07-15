<?php

namespace App\Http\Requests\Admin\Generalsetting;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
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
            'facebook'                   => ['required'],
            'twitter'                    => ['required'],
            'instagram'                  => ['required'],
            'youtube'                    => ['required'],
            'email'                      => ['email', 'required', 'string',  'max:255'],
            'phone_no'                   => ['required'],
            'mission_title'              => ['required'],
            'mission_statement'          => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'email.required'             => 'Email Field Is Required',
            'email.email'                => 'Email Must Be Valid Email with @ ',
            'email.string'               => 'Email Must Be In String Format',
            'email.max'                  => 'Email Max Length 255',
            'facebook.required'          => 'Facebook Field Is Required',
            'twitter.required'           => 'Twitter Field Is Required',
            'instagram.required'         => 'Instagram Field Is Required',
            'youtube.required'           => 'Youtube Field Is Required',
            'phone_no.required'          => 'Phone No. Field Is Required',
            'mission_title.required'     => 'Mission Title Field Is Required',
            'mission_statement.required' => 'Mission Statment Field Is Required',
        ];
    }
}
