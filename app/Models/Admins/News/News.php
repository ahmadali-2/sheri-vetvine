<?php

namespace App\Models\Admins\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable =['news_title','news_description','news_link'];
}
