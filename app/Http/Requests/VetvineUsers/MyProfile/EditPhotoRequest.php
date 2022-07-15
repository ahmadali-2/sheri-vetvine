<?php

namespace App\Http\Requests\VetvineUsers\MyProfile;

use Illuminate\Foundation\Http\FormRequest;

class EditPhotoRequest extends FormRequest
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
            'profile_photo' => 'required|image'
        ];
    }
    public function messages()
    {
        return [
            'profile_photo.required' => 'The Profile Photo field is required.',
            'profile_photo.image' => 'The Profile Photo must be image.',
        ];
    }
}
