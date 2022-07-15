<?php

namespace App\Models\Admins\Webinar;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;
    protected $fillable=['event_id','user_id','star_rating','comments'];

    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
