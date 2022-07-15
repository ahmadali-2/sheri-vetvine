<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventPayementRequest extends FormRequest
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
            'card_number' => 'required',
            'cvc_number'   => 'required',
            'exp_month'   => 'required',
            'exp_year'   => 'required',

        ];
    }

    public function messages(){
        return [
            'card_number.required' => 'Card Number is required',
            'cvc_number.required' => 'CVC Number is required',
            'exp_month.required' => 'Expired Month is required',
            'exp_year.required' => 'Expired Year is required',

        ];
    }
}
