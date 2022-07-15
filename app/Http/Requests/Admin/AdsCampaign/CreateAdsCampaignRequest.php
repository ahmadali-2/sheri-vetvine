<?php

namespace App\Http\Requests\Admin\AdsCampaign;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdsCampaignRequest extends FormRequest
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
            'campaign_name'             => ['required','string',],
            'start_date'                => ['required','after:yesterday'],
            'end_date'                  => ['required','after:yesterday'],
            'total_views_allowed'       => ['required','numeric','min:0'],
            'total_clicks_allowed'      => ['required','numeric','min:0'],
            'min_ctr'                   => ['required','numeric','min:0'],
            'network_id'                => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'campaign_name.required'             => 'Campaign Field Is Required',
            'start_date.required'                => 'Start Date Field Is Required',
            'end_date.required'                  => 'End Date Field Is Required',
            'total_views_allowed.required'       => 'Views Field Is Required',
            'total_clicks_allowed.required'      => 'Clicks Field Is Required',
            'min_ctr.required'                   => 'Click Through Ratio Field Is Required',
            'network_id.required'                => 'Network Level Field Is Required',
        ];

    }
}
