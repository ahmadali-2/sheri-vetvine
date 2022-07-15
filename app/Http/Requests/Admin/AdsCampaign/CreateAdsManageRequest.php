<?php

namespace App\Http\Requests\Admin\AdsCampaign;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdsManageRequest extends FormRequest
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
            'ad_name'               => ['required','string'],
            'ad_media'              => ['required'],
            'banner_image_url'      => ['required'],
            'campaign_id'           => ['required']
        ];
    }
    public function messages()
    {
        return [
            'ad_name.required'                     => 'Advertisement Name Field Is Required',
            'ad_media.required'                    => 'Advertisement Media Field Is Required',
            'banner_image_url.required'            => 'Advertisement Image URL Field Is Required',
            'campaign_id.required'                 => 'Campaign Name Field Is Required',
        ];

    }
}
