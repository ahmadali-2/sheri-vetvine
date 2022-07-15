<?php

namespace App\Models\Generals;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable=['memberable_id','memberable_type','member_id'];

    public function memberable()
    {
        $this->morphTo();
    }
}

