<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqCource extends Model
{
    public $table = 'faq_course';
    public $fillable = [
        'title', 'contant', 'cource_id'
    ];

    public $transcodeColumns = [
        'title', 'contant'
    ];
}
