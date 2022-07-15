<?php

namespace App\Models\Admins\Webinar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admins\Webinar\Event;
use App\Models\User;


class BuyEventPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'event_id',
        'amount',
        'transaction_id',
    ];
    public function buyevents()
    {
        return $this->belongsTo(Event::class,'event_id' ,'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
