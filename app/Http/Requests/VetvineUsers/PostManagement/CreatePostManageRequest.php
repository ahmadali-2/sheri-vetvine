<?php

namespace App\Http\Requests\VetvineUsers\PostManagement;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostManageRequest extends FormRequest
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
            'post_title'          => 'required',
            // 'post_photo'          => 'required',
            'post_link'           => 'required',
            'post_description'    => 'required',
        ];
    }
    public function messages()
    {
        return [
            'post_title.required'            => 'The Post Title Field is Required',
            // 'post_photo.required'            => 'The Post Photo Field is Required',
            'post_link.required'             => 'The Post Link Field is Required',
            'post_description.required'      => 'The Description Field is Required',
        ];
    }
}
