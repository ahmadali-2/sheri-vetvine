<?php

namespace App\Models\Admins\Webinar;

use App\Models\Admins\VideosonDemand\VideosOnDemand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    use HasFactory;
    protected $fillable=['category_title'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function video()
    {
        return $this->hasMany(VideosOnDemand::class, 'category_id');
    }
}

