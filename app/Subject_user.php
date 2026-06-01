<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_user extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'subject_id',

    ];
}
