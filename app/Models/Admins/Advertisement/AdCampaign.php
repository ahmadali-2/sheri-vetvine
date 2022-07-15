<?php

namespace App\Models\Admins\Advertisement;

use App\Models\UserMemberAndNetworkLevel;
use App\Models\Generals\Member;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AdCampaign
 * @package App\Models
 * @version January 13, 2022, 11:53 am UTC
 *
 * @property string $campaign_name
 * @property string $start_dt
 * @property string $is_end_on_specific_date
 * @property string $end_dt
 * @property integer $total_views_allowed
 * @property integer $total_clicks_allowed
 * @property integer $minimum_ctr
 * @property integer $member_level_id
 * @property integer $network_id
 * @property string $status
 */
class AdCampaign extends Model
{
    use HasFactory;

    public $table = 'ad_campaigns';

    public $fillable = [
        'campaign_name',
        'start_date',
        'is_end_on_specific_date',
        'end_date',
        'total_views_allowed',
        'total_clicks_allowed',
        'min_ctr',
        'member_level_id',
        'network_id',
        'status'
    ];

    public function advertisement()
    {
        return $this->hasMany(Ad::class);
    }

    public function networklevel()
    {
        return $this->belongsTo(UserMemberAndNetworkLevel::class , "network_id");
    }
    public function members()
    {
        return $this->morphMany(Member::class,'memberable');
    }
}
