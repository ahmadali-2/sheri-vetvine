<?php

namespace App\Http\Requests\Admin\Announcements;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnnouncementRequest extends FormRequest
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
            'announcement_title'    =>  'required',
            'member_id'             =>  'required',
            'description'           =>  'required',
        ];
    }
    public function messages()
    {
        return [
        'announcement_title.required'   => 'The Announcement Title Field is Required',
        'member_id.required'            => 'The Member Field is Required',
        'description.required'          => 'The Announcement Description Field is Required',
        ];
    }

}
