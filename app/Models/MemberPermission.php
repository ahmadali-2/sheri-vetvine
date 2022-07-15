<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'membertype_id',
        'view_ads',
        'comments',
    ];
    public function memberPermission()
    {
        return $this->belongsTo(MemberTypes::class, 'membertype_id');
    }
}
