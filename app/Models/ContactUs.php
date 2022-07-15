<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ContactUs
 * @package App\Models
 * @version January 13, 2022, 10:17 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $message
 */
class ContactUs extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contactus';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required|email'
    ];

    
}
