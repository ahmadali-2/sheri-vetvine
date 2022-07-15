<?php

namespace App\Models\Admins\GeneralSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'logo',
        'email',
        'phone_no',
        'mission_statement',
    ];
}
