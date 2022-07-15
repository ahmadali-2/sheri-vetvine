<?php

namespace App\Models\Admins\Forum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    use HasFactory;
    protected $table = 'post_views';

    protected $fillable = ['ip_address','agent','post_title','user_id','post_id'];

    public function postView()
    {
        return $this->belongsTo(Post::class ,'user_id','id');
    }

}
