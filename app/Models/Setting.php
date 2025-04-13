<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [        
        'description_ar',
        'description_en',
        'facebook',
        'twitter',
        'image',
    ];
}