<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'post_id',
        'share_id',
        'created_at',
    ];
}
