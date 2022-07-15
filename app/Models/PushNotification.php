<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admins\Forum\Post;


class PushNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id',
        'type',
        'post_user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function posts(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
