<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'news_title'        =>  'required',
            'news_link'         =>  'required',
            'news_description'  =>  'required',
        ];
    }
    public function messages()
    {
        return [
        'news_title.required'          => 'The News Title Field is Required',
        'news_link.required'           => 'The News Link is Required',
        'news_description.required'    => 'The News Description Field is Required',
        ];
    }

}
