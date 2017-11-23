<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vakexpert extends Model
{
     protected $fillable = [
        'name',
        'competentie',
        'description',
    ];
}
