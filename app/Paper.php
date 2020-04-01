<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = ['course_title', 'course_code', 'examiner', 'year', 'semester', 'filename', 'path'];
}
