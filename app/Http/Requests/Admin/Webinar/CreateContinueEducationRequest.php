<?php

namespace App\Http\Requests\Admin\Webinar;

use Illuminate\Foundation\Http\FormRequest;

class CreateContinueEducationRequest extends FormRequest
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
            'event_title'                        => ['required','string'],
            'tags'                               => ['required','string'],
            'category_id'                        => ['required'],
            'event_add_ytlink'                   => ['required'],
            'date'                               => ['required',],
            'time'                               => ['required'],
            'presenter_one'                      => ['required','string'],
            'presenter_one_url'                  => ['required'],
            'event_description'                  => ['required'],
            'main_photo'                         => ['required'],
            'vet_pet_prof_fee'                   => ['required','numeric','min:0'],
            'pet_owner_premium_fee'              => ['required','numeric','min:0'],
            'pet_owner_fee'                      => ['required','numeric','min:0'],
            'vet_pet_prof_premium_fee'           => ['required','numeric','min:0'],
            'sponser_id'                         => ['required'],

        ];
    }
    public function messages()
    {
        return [
            'event_title.required'               => 'Title Field Is Required',
            'tags.required'                      => 'Tags Field Is Required',
            'category_id.required'               => 'Category Field Is Required',
            'event_add_ytlink.required'          => 'Youtube Link Field Is Required',
            'date.required'                      => 'Date Field Is Required',
            'time.required'                      => 'Time Field Is Required',
            'presenter_one.required'             => 'Presenter One Field Is Required',
            'presenter_one_url.required'         => 'Presenter One URL Field Is Required',
            'event_description.required'         => 'Event Details Field Is Required',
            'main_photo.required'                => 'Photo Field Is Required',
            'vet_pet_prof_fee.required'          => 'Vet Pet Prof Fee Field Is Required',
            'vet_pet_prof_fee.min'               => 'The Vet Pet Prof Fee Must Be At Least 0.',
            'pet_owner_premium_fee.required'     => 'Pet Owner Premium Fee Field Is Required',
            'pet_owner_premium_fee.min'          => 'The Pet Owner Premium Fee Must Be At Least 0.',
            'pet_owner_fee.required'             => 'Pet Owner Fee Field Is Required',
            'pet_owner_fee.min'                  => 'The Pet Owner Fee Must Be At Least 0.',
            'vet_pet_prof_premium_fee.required'  => 'Vet Pet Prof Premium Fee Field Is Required',
            'vet_pet_prof_premium_fee.min'       => 'The Vet Pet Prof Premium Fee Must Be At Least 0.',
            'sponser_id.required'                => 'Select Sponser Field Is Required',
        ];

    }
}
