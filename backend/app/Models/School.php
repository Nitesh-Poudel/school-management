<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded=[];

    public function users()
    {
        return $this->hasMany(User::class, 'school_id');
    }

    public function roles()
    {
        return $this->hasMany(Role::class, 'school_id');
    }
}
