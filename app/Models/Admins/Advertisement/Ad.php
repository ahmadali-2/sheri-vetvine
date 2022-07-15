<?php

namespace App\Models\Admins\Advertisement;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ad
 * @package App\Models
 * @version January 13, 2022, 12:08 pm UTC
 *
 * @property integer $campaign_id
 * @property string $ad_name
 * @property string $ad_media
 * @property string $banner_image_url
 * @property string $banner_html_code
 * @property string $status
 */
class Ad extends Model
{

    use HasFactory;

    public $table = 'ads';

    public $fillable = [
        'campaign_id',
        'ad_name',
        'ad_media',
        'banner_image_url',
        'status'
    ];

    public function campaigns()
    {
        return $this->belongsTo(AdCampaign::class ,"campaign_id");
    }

}
