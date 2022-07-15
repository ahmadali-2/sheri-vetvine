<?php

namespace App\Http\Requests\Admin\Membership;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlanRequest extends FormRequest
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
            'plan_name'             => ['required','string'],
            'plan_price'            => ['required','numeric'],
            'plancategoryid'        => ['required'],
            'expiry_date'           => ['required'],
            'plan_description'      => ['required','string'],
            'member_id'             => ['required'],
            'plan_features'         => ['required','string'],

        ];
    }
    public function messages()
    {
        return [
            'plan_name.required'                 => 'Plan Name Field Is Required',
            'plan_price.required'                => 'Plan Price Field Is Required',
            'plancategoryid.required'            => 'Category Field Is Required',
            'expiry_date.required'               => 'Date Field Is Required',
            'plan_description.required'          => 'Description Field Is Required',
            'member_id.required'                 => 'Member Level Is Required',
            'plan_features.required'             => 'Plan Features Field Is Required',
        ];

    }
}
