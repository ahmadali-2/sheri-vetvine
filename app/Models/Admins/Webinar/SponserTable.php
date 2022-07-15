<?php

namespace App\Models\Admins\Webinar;

use App\Models\Admins\VideosonDemand\VideosOnDemand;
use App\Models\Admins\Webinar\Event;
use App\Models\Sponser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponserTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'sponser_name',
        'sponser_link',
        'sponser_image',
    ];

    public function events()
    {
        return $this->hasmany(Event::class);
    }
    public function sponsers()
    {
        return $this->morphMany(Sponser::class, 'sponserable');
    }

    public function video()
    {
        return $this->morphMany(VideosOnDemand::class, 'sponser_id');
    }

    public function videos()
    {
        return $this->belongsToMany(SponserTable::class, 'videos_on_demands_sponser_tables', 'sponsers_id', 'video_id');
    }

}
