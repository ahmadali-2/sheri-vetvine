<?php

namespace App\Models\Admins\Announcement;

use App\Models\Generals\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable =['announcement_title','description'];

    public function members()
    {
        return $this->morphMany(Member::class,'memberable');
    }
}
