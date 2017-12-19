<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vakexpert extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'competentie',
        'description',
    ];
}
