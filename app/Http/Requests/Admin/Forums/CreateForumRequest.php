<?php

namespace App\Http\Requests\Admin\Forums;

use Illuminate\Foundation\Http\FormRequest;

class CreateForumRequest extends FormRequest
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
            'forum_title'       =>  'required',
            'category_id'       =>  'required',
            'forum_description' =>  'required',
            'member_id'         =>  'required',
        ];
    }
    public function messages()
    {
        return [
        'forum_title.required'          => 'The Forum Title Field is Required',
        'category_id.required'          => 'The Category Field is Required',
        'forum_description.required'    => 'The Forum Description Field is Required',
        'member_id.required'            => 'The Member Level Field is Required',
        ];
    }
}
