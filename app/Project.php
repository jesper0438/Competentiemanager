<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'opdrachtgever',
        'uitvoerlocatie',
        'user_id',
        'doel',
        'competenties',
        'maxleden',
    ];
}
