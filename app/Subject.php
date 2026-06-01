<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'id',
        'name',

    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'subject_users');
    }
    public function mark()
    {
        return $this->hasMany(Mark::class);
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
