<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermAndCondiition extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_title',
        'page_desc'
    ];
}
