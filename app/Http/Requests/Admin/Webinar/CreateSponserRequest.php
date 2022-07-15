<?php

namespace App\Http\Requests\Admin\Webinar;

use Illuminate\Foundation\Http\FormRequest;

class CreateSponserRequest extends FormRequest
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
            'sponser_name'               => ['required','string'],
            'sponser_link'               => ['required','string'],
            'sponser_image'              => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'sponser_name.required'      => 'Sponsor Name Field Is Required',
            'sponser_link.required'      => 'Sponsor Link Field Is Required',
            'sponser_image.required'     => 'Sponsor Image Field Is Required',
        ];

    }
}
