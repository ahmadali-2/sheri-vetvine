<?php

namespace App\Models\VetVineUsers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmploymentInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'street_address',
        'business_name',
        'business_email',
        'country',
        'city',
        'work_phone',
    ];
}
