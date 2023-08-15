<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
      public $table = 'course_details';
    public $fillable = [
        'course_id', 'preview_video', 'preview_video_ar', 'preview_video2', 'preview_video2_ar', 'description', 'meta_title', 'keywords', 'meta_description','short_description','nameplan_a','nameplan_b','nameplan_c','certificatedesc_en','certificatedesc_ar'
        ,'thumbnail1','thumbnail2'
    ];

    public $transcodeColumns = [
        'short_description',
        'description',
        'meta_title',
        'keywords',
        'meta_description',
    ];
}
