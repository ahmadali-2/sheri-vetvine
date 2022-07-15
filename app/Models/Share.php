<?php

namespace App\Models;

use App\Models\Admins\Forum\Comment;
use App\Models\Admins\Forum\Like;
use App\Models\Admins\Forum\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'ce',
    ];

    public function users(){
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    public function posts(){
        return $this->hasMany(Post::class, 'id', 'post_id');
    }
    public function likes(){
        return $this->hasMany(ShareLike::class);
    }
}
