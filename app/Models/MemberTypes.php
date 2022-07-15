<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'member_type',
        'members',
    ];
    public function memberType()
    {
        return $this->hasMany(MemberPermission::class);
    }
    public function userTypeCheck()
    {
        return $this->hasMany(User::class,'type','id');
    }
}
