<?php

namespace App\Models\Admins\Memberships;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admins\Memberships\BuyMemberShipPlan;
use App\Models\Generals\Member;
use App\Models\Network;

class MemberShipPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_name',
        'plan_description',
        'plan_features',
        'plan_price',
        'expiry_date',
        'member_ship_plan_categories_id'

    ];
    public function network()
    {
        return $this->morphToMany(Network::class,'networkable');
    }
    public function plancategory()
    {
        return $this->belongsTo(MemberShipPlanCategory::class,'member_ship_plan_categories_id');
    }

    public function buymemberships()
    {
        return $this->hasMany(BuyMemberShipPlan::class);
    }
    public function members()
    {
        return $this->morphMany(Member::class,'memberable');
    }
}
