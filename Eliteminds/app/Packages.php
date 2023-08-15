<?php

namespace App;

use App\QuestionRoles;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    public $table = 'packages';
    public $primaryKey = 'id';
    public $timestamps = true;

    public $fillable = [
        'name',
        'slug',
        'description',
        'what_you_learn',
        'requirement',
        'who_course_for',
        'enroll_msg',
        'meta_tittle',
        'meta_description',
        'telegram',
        'whatsapp',
        'plandes'
    ];

    public $transcodeColumns = [
        'name',
        'description',
        'what_you_learn',
        'requirement',
        'who_course_for',
 
        'plandes',
       
    ];
}
