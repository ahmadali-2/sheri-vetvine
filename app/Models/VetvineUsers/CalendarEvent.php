<?php

namespace App\Models\VetvineUsers;

use App\Models\Admins\Webinar\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'event_id',
        'event_name',
        'event_start',
        'event_end',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
}
