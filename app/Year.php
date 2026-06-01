<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        'id',
        'name',

    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
