<?php

namespace App\Http\Requests\VetvineUsers\MyProfile;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInfoRequest extends FormRequest
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
            'street_address'    => 'required',
            'business_name'     => 'required',
            'business_email'    => 'required|email',
            'country'           => 'required',
            'city'              => 'required',
            'work_phone'        => 'required',
        ];
    }
    public function messages()
    {
        return [
            'street_address.required'   => 'The street address Field is Required',
            'business_name.required'    => 'The business name Field is Required',
            'business_email.required'   => 'The business email Field is Required',
            'country.required'          => 'The country Field is Required',
            'city.required'             => 'The city Field is Required',
            'work_phone.required'       => 'The work phone Field is Required',
        ];
    }
}
