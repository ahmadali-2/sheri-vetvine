<?php

namespace App\Http\Requests\Admin\Forums;

use Illuminate\Foundation\Http\FormRequest;

class ForumCategoryRequest extends FormRequest
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
            'category_title'=>'required'
        ];
    }
    public function messages()
    {
        return [
        'category_title.required' => 'The Title Field is Required',
        ];
    }
}
