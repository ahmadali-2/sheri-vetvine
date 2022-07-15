<?php

namespace App\Models\Admins\Forum;
use App\Models\Generals\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'forum_title',
        'forum_description',
    ];

    public function members()
    {
        return $this->morphMany(Member::class,'memberable');
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'forum_id','id');
    }
    public function countposts()
    {
        return $this->hasMany('posts')->count();
    }
    public function category()
    {
        return $this->belongsTo(CategoryForum::class,'category_id','id');
    }
    public function likecount()
    {
        return $this->hasManyThrough(Like::class, Post::class);
    }

}
