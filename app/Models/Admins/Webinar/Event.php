<?php

namespace App\Models\Admins\Webinar;

use App\Models\Admins\Webinar\BuyEventPlan as WebinarBuyEventPlan;
use App\Models\Admins\Webinar\ReviewRating;
use App\Models\User;
use App\Models\Sponser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'user_id',
        'event_title',
        'tags',
        'event_add_ytlink',
        'date',
        'time',
        'presenter_one',
        'presenter_one_url',
        'presenter_two',
        'presenter_two_url',
        'presenter_three',
        'presenter_three_url',
        'event_description',
        'main_photo',
        'vet_pet_prof_fee',
        'pet_owner_premium_fee',
        'pet_owner_fee',
        'vet_pet_prof_premium_fee',
        'status',
        'timezone_url'
    ];
    public function events()
    {
        return $this->belongsTo(CategoryEvent::class,"category_id");
    }
    public function sponsermember()
    {
        return $this->belongsTo(SponserTable::class,"sponser_id");
    }
    public function sponsers()
    {
        return $this->morphMany(Sponser::class,'sponserable');
    }
    public function members()
    {
        return $this->belongsToMany(SponserTable::class, "sponsers",'sponserable_id', 'sponser_id',);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function buyeventplan()
    {
        return $this->hasMany(WebinarBuyEventPlan::class);
    }
    public function calendarEvents()
    {
        return $this->hasMany(CalendarEvent::class);
    }
    public function ReviewData()
    {
    return $this->hasMany(ReviewRating::class);
    }

}
