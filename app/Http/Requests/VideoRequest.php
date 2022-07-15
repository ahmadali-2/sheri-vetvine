<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'video_title' => 'required',
            'video_link'  => 'required',
            'presented_by' => 'required',
            'video_description' => 'required',
            'category' => 'required',
            'sponser_id' => 'required',
        ];
    }
}
