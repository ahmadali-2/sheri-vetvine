<?php

namespace App\Http\Requests\VetvineUsers\Settings;

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
            'emailaddress' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'emailaddress.required' => 'Emailaddress Field is Required',
        ];
    }
}
