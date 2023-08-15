<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public $table = 'posts';

    public $fillable = [
        'title',
        'youtube',
        'prepared_by',
        'published_by',
        'linkedin',
        'content',
        'vimeo_id',
        'meta_title',
        'meta_description',
        'viewer',
        'short_description',
    ];

    public $transcodeColumns = [
        'title',
        'prepared_by',
        'published_by',
        'content',
    ];
}
