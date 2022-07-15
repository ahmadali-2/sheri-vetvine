<?php

namespace App\Models\Admins\Memberships;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admins\Memberships\MemberShipPlan;
use App\Models\User;

class BuyMemberShipPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'member_ship_plan_id',
        'amount',
        'transaction_id',       
    ];

    public function membershipplans()
    {
        return $this->belongsTo(MemberShipPlan::class,'member_ship_plan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
