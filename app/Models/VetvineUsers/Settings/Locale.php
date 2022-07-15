<?php

namespace App\Models\VetVineUsers\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    use HasFactory;
    protected $fillable = ['locale_name'];
}
