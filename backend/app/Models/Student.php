<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // public function setClassAttribute($value)
    // {
    //     $this->attributes['class_id'] = $value; // Set 'class_id' from the 'class' input
    // }

}
