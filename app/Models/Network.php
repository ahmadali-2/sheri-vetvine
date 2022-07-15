<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'networkable_id',
        'networkable_type'
    ];

    public function networkable()
    {
        return $this->morphTo();
    }

}
