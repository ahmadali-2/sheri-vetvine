<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admins\Webinar\Event;

class Sponser extends Model
{


    use HasFactory;
    protected $fillable=['sponser_id','sponserable_type','sponserable_id'];

    public function sponserable()
    {
        $this->morphTo();
    }
   public function sponsername()
    {
        return $this->hasMany(SponserTable::class,'sponser_id');
    }

}
