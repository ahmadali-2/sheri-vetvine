<?php

namespace App\Models\Admins\Memberships;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberShipPlanCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'status'
    ];
}
