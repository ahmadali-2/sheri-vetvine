<?php

namespace App\Models\Admins\Forum;

use App\Models\Admins\Forum\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id',
        'like',
        'ce',
    ];
    public function posts()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }
    function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
