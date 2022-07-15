<?php

namespace App\Models\Admins\VideosonDemand;

use App\Models\Admins\Webinar\CategoryEvent;
use App\Models\Admins\Webinar\SponserTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideosOnDemand extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'video_title',
        'video_description',
        'video_link',
        'post_add_video',
        'presented_by',
        'status',
        'category_id',
        'sponser_id',
        'isDeleted'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryEvent::class, 'category_id');
    }

    public function sponsers()
    {
        return $this->belongsToMany(SponserTable::class, 'videos_on_demands_sponser_tables', 'video_id', 'sponsers_id');
    }

}
