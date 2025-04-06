<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    protected $table = 'classes';
    protected $fillable = [
        'school_id',
        'class_name',
        'section',
        'class_teacher_id',
    ];

    // public function school()
    // {
    //     return $this->belongsTo(School::class);
    // }

    // // Relationship with the Teacher (User) model
    // public function teacher()
    // {
    //     return $this->belongsTo(User::class, 'class_teacher_id');
    // }
}
