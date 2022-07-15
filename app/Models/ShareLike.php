<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareLike extends Model
{
    use HasFactory;
    protected $fillable = [
        'share_id',
        'user_id',
        'like',
        'ce',
    ];
    public function shares()
    {
        return $this->belongsTo(Share::class,'share_id','id');
    }
    function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
