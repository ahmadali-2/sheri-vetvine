<?php

namespace App\Models;

use App\Models\Admins\Advertisement\AdCampaign;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use PDO;

class UserMemberAndNetworkLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'status',
        'name',
        'registration_fee',
    ];

    //check user network level
    public function  userNetworkLevels()
    {
        return $this->hasOne(User::class);
    }

    public function campaigns()
    {
        return $this->hasMany(AdCampaign::class);
    }
}
